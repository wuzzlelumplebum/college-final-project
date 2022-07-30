@extends('klien.layout')

@section('css')
<style type="text/css">
	.datatable-column-width{
		overflow: hidden; text-overflow: ellipsis; max-width: 200px;
	}
</style>
@endsection

@section('content')

<!-- Page header -->
		<div class="page-title d-flex">
			<h4><span class="font-weight-semibold">Home</span> - Data Pembayaran</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

	<!-- Hover rows -->
	<div class="card">
		<table class="table datatable-basic table-hover">
			<thead>
				<tr>
					<th style="width: 50px">No</th>
					<th style="width: 200px">No. Receipt</th>
					<th style="width: 200px">Nominal (Rp)</th>
					<th style="width: 100px">Tanggal Pembayaran</th>
					<th style="width: 250px">Keterangan</th>
					<th style="width: 100px">Status</th>
				</tr>
			</thead>
			<tbody>
				@if(!$payments->isEmpty())
				@php ($i = 1)
				@foreach($payments as $payment)
				<tr>
					<td>{{$i}}</td>
					<td><div class="datatable-column-width">{{$payment->receipt_no ? $payment->receipt_no : ''}}</div></td>
					<td style="font-size: 15px;">{{ number_format($payment->nominal, 0, ',', ',') }}</td>
					<td>{{$payment->tanggal}}</td>
					<td><div class="datatable-column-width">{!! $payment->keterangan !!}</div></td>
					<td>
						@if($payment->status == 0 )
						<span style="font-size:100%;" class="badge badge-pill bg-orange-400 ml-auto ml-md-0">{{config('custom.payment.'.$payment->status)}}</span>
						@elseif($payment->status == 1)
						<span style="font-size:100%;" class="badge badge-pill bg-success-400 ml-auto ml-md-0">{{config('custom.payment.'.$payment->status)}}</span>
						@else
						<span style="font-size:100%;" class="badge badge-pill bg-danger-400 ml-auto ml-md-0">{{config('custom.payment.'.$payment->status)}}</span>
						@endif
					</td>
				</tr>
				@php ($i++)
				@endforeach
				@else
				<tr><td align="center" colspan="6">Data Kosong</td></tr>
				@endif
			</tbody>
		</table>
	</div>
	<!-- /hover rows -->
</div>
@endsection

@section('js')
<!-- Theme JS files -->
<script src="{{asset('global_assets/js/plugins/notifications/pnotify.min.js')}}"></script>
<script src="{{ URL::asset('global_assets/js/plugins/notifications/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ URL::asset('global_assets/js/plugins/buttons/spin.min.js') }}"></script>
<script src="{{ URL::asset('global_assets/js/plugins/buttons/ladda.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('global_assets/js/demo_pages/components_modals.js') }}"></script>
<script>
	let getToken = function() {
		return $('meta[name=csrf-token]').attr('content')
	}

	var DatatableBasic = function() {

		// Basic Datatable examples
		var _componentDatatableBasic = function() {
			if (!$().DataTable) {
				console.warn('Warning - datatables.min.js is not loaded.');
				return;
			}

			// Setting datatable defaults
			$.extend( $.fn.dataTable.defaults, {
				autoWidth: false,
				columnDefs: [{
					orderable: false,
					// width: 100,
					targets: [ 4 ]
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

		// Select2 for length menu styling
		var _componentSelect2 = function() {
			if (!$().select2) {
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

		return {
			init: function() {
				_componentDatatableBasic();
				_componentSelect2();
			}
		}
	}();

	document.addEventListener('DOMContentLoaded', function() {
		DatatableBasic.init();
	});


	$( document ).ready(function() {
		// Default style
		@if(session('error'))
		new PNotify({
			title: 'Error',
			text: '{{ session('error') }}.',
			icon: 'icon-blocked',
			type: 'error'
		});
		@endif
		@if ( session('success'))
		new PNotify({
			title: 'Success',
			text: '{{ session('success') }}.',
			icon: 'icon-checkmark3',
			type: 'success'
		});
		@endif

	});
</script>
@endsection