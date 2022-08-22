@extends('klien.layout')

@section('css')
<style>
    .datatable-column-width{
        overflow: hidden; text-overflow: ellipsis; max-width: 200px;
    }
</style>
@endsection

@section('content')
<!-- Page header -->
		<div class="page-title d-flex">
			<h4><span class="font-weight-semibold">Home</span> - Data Proyek {{ \Auth::user()->nama }}</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card" style="border-radius: 10px;">
        <div class="card-header header-elements-inline"></div>
        <div class="card-body">
            <table class="table datatable-basic table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 250px">Nama Proyek</th>
                        <th style="width: 100px;">Masa Berlaku</th>
                        <th style="width: 400px;">Keterangan</th>
                        <th style="width: 50px;">Jumlah Task</th>
                        <th class="text-center" style="width: 50px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$proyeks->isEmpty())
                    @php($i = 1)
                    @foreach ($proyeks as $proyek)
                        <tr>
                            <td>{{ $i }}</td>
                            <td><div class="datatable-column-width">{{ $proyek->nama_proyek }}</div></td>
                            <td><div class="datatable-column-width">{{ date("Y-m-d", strtotime($proyek->masa_berlaku)) }}</div></td>
                            <td><div class="datatable-column-width">{!! $proyek->keterangan !!}</div></td>
                            <td align="center">
                                @if($proyek->task_count < 1 )
                                    <span style="font-size:100%;" class="badge badge-pill bg-danger-400 ml-auto ml-md-0">0</span>
                                @else
                                    <span style="font-size:100%;" class="badge badge-pill bg-success-400 ml-auto ml-md-0">{{$proyek->task_count}}</span>
                                @endif
                            </td>
                            <td align="center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-stack-text"></i> Create Task</a>
                                            <a href="{{ route('proyekclients.show', $proyek->id) }}" class="dropdown-item"><i class="icon-images3"></i> Show</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /content area -->
@endsection

@section('js')
    <!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/notifications/pnotify.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('global_assets/js/demo_pages/components_modals.js')}}"></script>

    <script>
        var DatatableBasic = function() {
            // Basic Datatable examples
            var _componentDatatableBasic = function() {
                if(!$().DataTable) {
                    console.warn('Warning - datatables.min.js is not loaded.');
                    return;
                }

                // Setting datatable defaults
                $.extend($.fn.dataTable.defaults, {
                    autoWidth: false,
                    columnDefs: [{
                        orderable: false,
                        width: 100,
                        targets: [ 5 ],
                    }],
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		            language: {
		                search: '<span>Filter:</span> _INPUT_',
		                searchPlaceholder: 'Type to filter...',
		                lengthMenu: '<span>Show:</span> _MENU_',
		                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
		            }
                });

                // Basic datatable
                $('.datatable-basic').DataTable();

                // Alternative pagination
		        $('.datatable-pagination').DataTable({
		            pagingType: "simple",
		            language: {
		                paginate: {'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'}
		            }
		        });

                // Datatable with saving state
		        $('.datatable-save-state').DataTable({
		            stateSave: true
		        });

		        // Scrollable datatable
		        var table = $('.datatable-scroll-y').DataTable({
		            autoWidth: true,
		            scrollY: 300
		        });

		        // Resize scrollable table when sidebar width changes
		        $('.sidebar-control').on('click', function() {
		            table.columns.adjust().draw();
		        });
            };

            return{
                init: function() {
                    _componentDatatableBasic();
                    _componentSelect2();
                }
            }
        }();

        // Initialize modules
        document.addEventListener('DOMContentLoaded', function() {
            DatatableBasic.init();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Default style
            @if(session('error'))
                new PNotify({
                    tittle:'Error',
                    text: '{{ session('error') }}.',
                    icon: 'icon-blocked',
                    type: 'error'
                })
            @endif
            @if(session('success'))
                new PNotify({
                    tittle:'Success',
                    text: '{{ session('success') }}.',
                    icon: 'icon-checkmark3',
                    type: 'success'
                })
            @endif
        });
    </script>
@endsection