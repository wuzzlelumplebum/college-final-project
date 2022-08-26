@extends('klien.layout')

@section('css')
    <style>
        .bg-600{
            border-radius: 10px;
            width: 95%;
        }
        .rectangle{
            position: static;
            width: 70px;
            height: 6px;
            background: #008080;
            border-radius: 5px;
            margin-top: -5px;
        }
        .row{
            margin-top: 15px;
        }
        .row-a{
            margin-top: 15px;
        }
        .content{
            background: #F5F5F4;
        }
        .contents{
            padding-left: 30px;
            padding-bottom: 10px;
        }
        .title{

        }
        .card{
            padding-bottom: 20px;
        }
        .tab-content > .tab-pane {
        display: block;
        height: 0px;
        overflow: hidden;
        }
        .tab-content > .active {
            height: auto;
        }
    </style>
@endsection

@section('content')
    <!-- Page header -->
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">Home</span> - Dashboard</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content pt-0 mt-2">

        <!-- Greetings message -->
        <input id="user" type="hidden" name="" value="{{ $user->nama }}">
        <div id="greetings" align="center"></div>

        {{-- <!-- Quick stats boxes -->
        <div class="title" style="padding-bottom: 20px">
            <h4><span class="font-weight-semibold">Info Penting</span></h4>
            <div class="rectangle">
            </div>
        </div> --}}
        <div class="card" style="border-radius: 10px;">
            <div class="row">
                <div class="contents">
                    <h5><span class="font-weight-semibold">Sisa Tagihan {{ \Auth::user()->nama }}</span></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-coins icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 18px;">
                                        Sisa DP Tagihan
                                    </div>
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">{{ $dptagihanclient }}</h3>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-coins icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 18px;">
                                        Sisa Tagihan
                                    </div>
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">{{ $tagihanclient }}</h3>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-coins icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 18px;">
                                        Total Sisa DP dan Tagihan
                                    </div>
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">{{ ($dptagihanclient) + ($tagihanclient) }}</h3>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="contents">
                    <h5><span class="font-weight-semibold">Total Proyek {{ \Auth::user()->nama }}</span></h5>
                </div>
            </div>
            <div class="row">
                <table class="table datatable-basic table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Proyek</th>
                            <th>Total Task</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($progress as $prog)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><div class="datatable-column-width">{{ $prog->nama_proyek }}</div></td>
                                <td><div class="datatable-column-width">{{ $prog->task_count }}</div></td>
                                <td align="center">
                                    <div class="datatable-column-width">
                                        <div class="progress rounded-round">
                                            @if ($prog->task_done && $prog->task_count > 0)
                                            <div class="progress-bar bg-warning" style="width: {{ ($prog->task_done)/($prog->task_count)*100 }}%;">
                                                <span>{{ ($prog->task_done)/($prog->task_count)*100 }}% Complete</span>
                                            </div>
                                            @else
                                            <div class="progress-bar bg-warning" style="width: 0%;">
                                                <span>0% Complete</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="border-radius: 10px;">
            <div class="row">
                <div class="contents">
                    <h5><span class="font-weight-semibold">Total Proyek {{ \Auth::user()->nama }}</span></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-display icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 16px">
                                        Proyek Website
                                    </div>
                                    <div class="d-flex">
                                        <h4 class="font-weight-semibold mb-0">{{ $websiteclient }}</h4>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-display icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 16px;">
                                        Proyek Iklan/Ads
                                    </div>
                                    <div class="d-flex">
                                        <h4 class="font-weight-semibold mb-0">{{ $adsclient }}</h4>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-display icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 16px;">
                                        Proyek Sistem Informasi
                                    </div>
                                    <div class="d-flex">
                                        <h4 class="font-weight-semibold mb-0">{{ $siclient }}</h4>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-display icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 16px;">
                                        Proyek Mobile App
                                    </div>
                                    <div class="d-flex">
                                        <h4 class="font-weight-semibold mb-0">{{ $mobileclient }}</h4>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-display icon-4x"></i>
                                </div>

                                <div>
                                    <div style="font-size: 16px;">
                                        Proyek Custom/Lainnya
                                    </div>
                                    <div class="d-flex">
                                        <h4 class="font-weight-semibold mb-0">{{ $customclient }}</h4>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/progressbar.min.js') }}"></script>

    <script src="{{asset('assets/js/app.js') }}"></script>
    <script src="{{asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/components_progress.js') }}"></script>
    <!-- /theme JS files -->

    <script>
        var day = new Date();
        var hrs = day.getHours();
        var name = $('#user').val();

        console.log(name);

        var greet = "";

        if (hrs < 12){
            greet = "Good Morning";
        }
        else if (hrs >= 12 && hrs <= 17){
            greet = "Good Afternoon";
        }
        else if (hrs >= 18 && hrs <= 23){
            greet = "Good Evening";
        }

        // console.log(hrs);
        // console.log(greet);
        document.getElementById('greetings').innerHTML += 
        '<h2>' + greet + ', ' + name + '!' + '</h2>';

        // Progress bar
        var Progress = function(){
            // setup module components
            var _componentProgress = function(){
                if (!$().progressbar) {
                    console.warn('Warning - progressbar.min.js is not loaded.');
                    return;
                }

                // Basic progress bar

                // Start
                $('#h-default-basic-start').on('click', function() {
                    var $pb = $('#h-default-basic .progress-bar');
                    $pb.attr('data-transitiongoal', $pb.attr('data-transitiongoal-backup'));
                    $pb.progressbar();
                });

                // Reset
                $('#h-default-basic-reset').on('click', function() {
                    $('#h-default-basic .progress-bar').attr('data-transitiongoal', 0).progressbar();
                });
            };

            // Return objects
            return {
                init: function(){
                    _componentProgress();
                }
            }
        }();

        // Initialize module
        document.addEventListener('DOMContentLoaded', function() {
            Progress.init();
        });
    </script>
@endsection