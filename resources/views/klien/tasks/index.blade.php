@extends('klien.layout')

@section('css')
    
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
    <div class="card">
        <table class="table datatable-basic table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kebutuhan</th>
                    <th>Severity</th>
                    <th>Handler</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if (!$tasks->isEmpty())
                @php ($i = 1)
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><div class="datatable-column-width">{{ date("Y-m-d", strtotime($task->created_at)) }}</div></td>
                        <td><div class="datatable-column-width">{{ $task->kebutuhan }}</div></td>
                        <td><div class="datatable-column-width">{{ config('custom.severity.'.$task->severity) }}</div></td>
                        <td>
                            <div class="datatable-column-width form-check">
                                <label class="form-check-label">
                                    @if (@$task->assign->nama == NULL)
                                        <p style="color:red;">Belum ada handler</p>
                                    @else
                                        {{ @$task->assign->nama }}
                                    @endif    
                                </label>
                            </div>
                        </td>
                        <td align="center">
                            @if ($task->status == 2)
                                <span style="font-size: 100%" class="badge badge-pill bg-orange-400 ml-auto ml-md-0">{{ config('custom.status.'.$task->status) }}</span>
                            @else
                                {{ config('custom.status.'.$task->status) }}
                            @endif
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
<!-- /content area -->
@endsection