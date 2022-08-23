@extends('klien.layout')

@section('css')
    
@endsection

@section('content')
    <!-- Page header -->
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">Home</span> - Detail Data Proyek</h4>
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
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Data Proyek</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama Proyek</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ $proyek->nama_proyek }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Website</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ $proyek->website }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Jenis Proyek</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ $proyek->jenis_proyek ? config('custom.jenis_proyek.'.$proyek->jenis_proyek) : '-' }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Kelas Layanan</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ $proyek->tipe ? config('custom.kelas_layanan.'.$proyek->tipe) : '-' }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Jenis Layanan</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ $proyek->jenis_layanan ? config('custom.jenis_layanan.'.$proyek->jenis_layanan) : '-' }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Masa Berlaku</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ date('d F Y', strtotime($proyek->masa_berlaku)) }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Jumlah Task</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{{ $proyek->task_count }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-10">{!! $proyek->keterangan !!}</label>
                        </div>
                    </div>
                </fieldset>
                <div class="text-right">
                    <a href="{{ route('proyekclients.index') }}" class="btn bg-slate" style="border-radius: 10px">Kembali <i class="icon-undo2 ml-2"></i></a>
                </div>
            </div>
        </div>
        <!-- /hover rows -->
    </div>
    <!-- /content area -->
@endsection