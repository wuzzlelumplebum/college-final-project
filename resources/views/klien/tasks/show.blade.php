@extends('klien.layout')

@section('css')
    
@endsection

@section('content')
    <!-- Page header -->
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">Home</span> - Detail Data Tasks</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Hover rows -->
        <div class="card">
            <div class="card-header header-elements-inline"></div>
            <div class="card-body">
                <form action="{{ route('taskclients.update', $task->id) }}" id="form_task" method="post">
                    @csrf
                    @method('PATCH')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Data Task</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Klien</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-10">{{ $task->user->nama }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Proyek</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-10">{{ $task->proyek->nama_proyek }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tanggal Pembuatan</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-10">{{ date('d F Y', strtotime($task->created_at)) }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Handler</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-10">{{ $task->user->nama }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kebutuhan</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-10">{!! $task->kebutuhan !!}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Severity</label>
                            <div class="col-lg-10">
                                <select name="severity" class="form-control select-search" id="" data-fuoc disabled>
                                    <option value="">-- Pilih Severity --</option>
                                    @foreach (config('custom.severity') as $key => $value)
                                        <option {{ $task->severity == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <select name="severity" class="form-control select-search" id="" data-fuoc disabled>
                                    <option value="">-- Pilih Severity --</option>
                                    @foreach (config('custom.severity') as $key => $value)
                                        <option {{ $task->status == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- /hover rows -->
    </div>
    <!-- /content area -->
@endsection