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
			<h4><span class="font-weight-semibold">Home</span> - Data Tasks</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Content Area -->
<div class="content">
    <div class="card" style="border-radius: 10px">
        <div class="card-header header-elements-inline">
            <a href="{{ route('taskclients.create') }}"><button type="button" class="btn btn-success rounded-round" style="background: #6EBA93"><i class="fa fa-plus" style="font-size:12px"></i>&nbsp Tambah</button></a>
        </div>

        <div class="card-body">
            <table class="table datatable-basic table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kebutuhan</th>
                        <th>Severity</th>
                        <th>Handler</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$tasks->isEmpty())
                    @php ($i = 1)
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $i }}</td>
                            <td><div class="datatable-column-width">{{ date("Y-m-d", strtotime($task->created_at)) }}</div></td>
                            <td><div class="datatable-column-width">{!! $task->kebutuhan !!}</div></td>
                            <td><div class="datatable-column-width">{{ config('custom.severity.'.$task->severity) }}</div></td>
                            <td>
                                <div class="datatable-column-width form-check-label">
                                    <label class="form-check-label">
                                        @if (@$task->assign->nama == NULL)
                                            <p style="color:red;">Belum ada handler</p>
                                        @else
                                            {{ @$task->assign->nama }}
                                        @endif    
                                    </label>
                                </div>
                            </td>
                            <td>
                                @if ($task->status == 2)
                                    <span style="font-size: 100%" class="badge badge-pill bg-orange-400 ml-auto ml-md-0">{{ config('custom.status.'.$task->status) }}</span>
                                @else
                                    <span style="font-size: 100%;" class="badge badge-pill badge-info ml-auto ml-md-0">{{ config('custom.status.'.$task->status) }}</span>
                                @endif
                            </td>
                            <td align="center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
    
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('taskclients.edit', $task->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
                                            <a href="{{ route('taskclients.show', $task->id) }}" class="dropdown-item"><i class="icon-images3"></i> Show</a>
                                            <a class="dropdown-item delbutton" data-toggle="modal" data-target="#modal_theme_danger" data-uri="{{ route('taskclients.destroy', $task->id)}}"><i class="icon-x"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @php ($i++)
                    @endforeach
                    @else
                        <tr><td align="center" colspan="8">Data Kosong</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /content area -->

<!-- Danger Modal -->
<div id="modal_theme_danger" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger" align="center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="post" id="delform">
                @csrf
                @method('DELETE')
                <div class="modal-body" align="center">
                    <h2> Hapus Data? </h2>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /danger modal -->
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
        // Modal delete
        $(document).on("click", ".delbutton", function(){
            var url = $(this).data('uri');
            $('#delform').attr('action', url);
        })

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
                        targets: [ 6 ],
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

            var _componentSelect2 = function() {
                if(!$().select2) {
                    console.warn('Warning - select2.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity,
                    dropdownAutoWidth: true,
                    width: 'auto'
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