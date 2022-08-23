@extends('klien.layout')

@section('css')
    
@endsection

@section('content')
    <!-- Page header -->
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">Home</span> - Tambah Data Tasks</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Hover rows -->
        <div class="card">
            <div class="card-header header-elements-inline">
            </div>
            <div class="card-body">
                <form id="form_task" action="{{ route('taskclients.store') }}" method="post" class="form-validate-jquery" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Data Task</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Klien</label>
                            <div class="col-lg-10">
                                <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                <input type="text" name="nama" class="form-control border-teal border-1" value="{{ \Auth::user()->nama }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Proyek</label>
                            <div class="col-lg-10">
                                <select name="id_proyek" class="form-control select-search" id="" data-fuoc>
                                    <option value="">-- Pilih Proyek --</option>
                                    @foreach ($proyeks as $proyek)
                                        <option name="nama_proyek" value="{{ $proyek->id }}" {{ $proyek->id == old('id_proyek') ? 'selected' : '' }}>{{ $proyek->nama_proyek }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tanggal Pembuatan</label>
                            <div class="col-lg-10">
                                <input style="border-radius: 10px" name="tanggal" type="text" class="form-control pickadate-accessibility" placeholder="Contoh: 2022-04-16" value="{{ date('Y-m-d') }}" required>
                                <span class="form-text text-muted">Ubah tanggal jika pembuatan task tidak dilakukan HARI INI</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tenggat Waktu</label>
                            <div class="col-lg-10">
                                <input style="border-radius: 10px" name="tenggat" type="text" class="form-control pickadate-accessibility" placeholder="Contoh: 2022-04-16" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kebutuhan</label>
                            <div class="col-lg-10">
                                <input class="form-control border-teal border-1" type="text" name="kebutuhan" id="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Severity</label>
                            <div class="col-lg-10">
                                <select name="severity" class="form-control select-search" id="" data-fuoc>
                                    <option value="">-- Pilih Severity --</option>
                                    @foreach (config('custom.severity') as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
						<a href="{{ url('/taskclients') }}" class="btn bg-slate">Kembali <i class="icon-undo2 ml-2"></i></a>
                        <button type="submit" class="btn btn-primary">Simpan <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /hover rows -->
    </div>
    <!-- /content area -->
@endsection

@section('js')
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/editor_summernote.js') }}"></script>

<script>
    // Accessibility labels
    $('.pickadate-accessibility').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearSelect: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: true,
        format: 'yyyy-mm-dd',
    });

    // Summernote
    var Summernote = function() {
        var _componentSummernote = function() {
            if (!$().summernote) {
                console.warn('Warning - summernote.min.js is not loaded');
                return;
            }
    
            // Default initialization
            $('.summernote').summernote({
                toolbar: false,
                height: 100,
            });
        };

        // Return objects assigned to module
        return{
            init: function() {
                _componentSummernote();
            }
        }
    }();

    // Initialize module
    document.addEventListener('DOMContentLoaded', function() {
        Summernote.init();
    });

    var FormValidation = function() {
        // Select2 select
        var _componentSelect2 = function() {
            if (!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }

            // Initialize
            var $select = $('.select-search').select2({
                // minimumResultsForSearch: Infinity
            });

            // Trigger value change when selection is made
            $select.on('change', function() {
                $(this).trigger('blur');
            });
        };

        // Validation config
        var _componentValidation = function() {
            if (!$().validate) {
                console.warn('Warning - validate.min.js is not loaded.');
                return;
            }

            // Initialize
            var validator = $('#form_task').validate({
                ignore: 'input[type=hidden], .select2-search__field', //ignore hidden fields
                errorClass: 'validation-invalid-label',
                validClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                errorPlacement: function(error, element){
                    // Unsytled checkboxes, radios
                    if (element.parents().hasClass('form-check')) {
                        error.appendTo(element.parents('.form-check').parent());
                    }

                    // Input with icons and Select2
                    else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                        error.appendTo( element.parent() );
                    }

                    // Input group, styled file input
                    else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                        error.appendTo( element.parent().parent() );
                    }

                    // Other elements
                    else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    id_proyek: {
                        required: true
                    },
                    kebutuhan:{
                        required: true
                    },
                    severity:{
                        required: true
                    },
                },
                messages: {
                    id_proyek: {
                        required: 'Mohon pilih proyek'
                    },
                    kebutuhan: {
                        required: 'Mohon isi kebutuhan'
                    },
                    severity: {
                        required: 'Mohon pilih severity'
                    },
                }
            });
        };

        // Return objects assigned to module
        return {
            init: function() {
                _componentSelect2();
                _componentValidation();
            }
        }
    }();

    // Initialize module
    document.addEventListener('DOMContentLoaded', function() {
        FormValidation.init();
    });

    var FileUpload = function() {
        // Bootstrap file upload
        var _componentFileUpload = function() {
            if (!$().fileinput) {
                console.warn('Warning - fileinput.min.js is not loaded.');
                return;
            }

            // Modal template
            var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
                '  <div class="modal-content">\n' +
                '    <div class="modal-header align-items-center">\n' +
                '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
                '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
                '    </div>\n' +
                '    <div class="modal-body">\n' +
                '      <div class="floating-buttons btn-group"></div>\n' +
                '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
                '    </div>\n' +
                '  </div>\n' +
                '</div>\n';

            // Buttons inside zoom modal
            var previewZoomButtonClasses = {
                toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
                fullscreen: 'btn btn-light btn-icon btn-sm',
                borderless: 'btn btn-light btn-icon btn-sm',
                close: 'btn btn-light btn-icon btn-sm'
            };

            // Icons inside zoom modal classes
            var previewZoomButtonIcons = {
                prev: '<i class="icon-arrow-left32"></i>',
                next: '<i class="icon-arrow-right32"></i>',
                toggleheader: '<i class="icon-menu-open"></i>',
                fullscreen: '<i class="icon-screen-full"></i>',
                borderless: '<i class="icon-alignment-unalign"></i>',
                close: '<i class="icon-cross2 font-size-base"></i>'
            };

            // File actions
            var fileActionSettings = {
                zoomClass: '',
                zoomIcon: '<i class="icon-zoomin3"></i>',
                dragClass: 'p-2',
                dragIcon: '<i class="icon-three-bars"></i>',
                removeClass: '',
                removeErrorClass: 'text-danger',
                removeIcon: '<i class="icon-bin"></i>',
                indicatorNew: '<i class="icon-file-plus text-success"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
            };

            $('.file-input').fileinput({
                browseLabel: 'Browse',
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                showUpload: false,
                removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>',
                    modal: modalTemplate
                },
                initialCaption: "No file selected",
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons,
                fileActionSettings: fileActionSettings
            });

        };

        return {
            init: function() {
                _componentFileUpload();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        FileUpload.init();
    });
</script>
<script>
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