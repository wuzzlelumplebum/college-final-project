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
    <div class="content pt-0">

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
                    <h5><span class="font-weight-semibold">Info Tagihan {{ \Auth::user()->nama }}</span></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contents">
                        <div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
                            <blockquote class="blockquote d-flex py-2 mb-0">
                                <div class="mr-4" style="padding-left: 1.875rem;">
                                    <i class="icon-users icon-4x"></i>
                                </div>

                                <div>
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0"></h3>
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
    <script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('global_assets\js\plugins\visualization\echarts\echarts.min.js') }}"></script>

    <script src="{{asset('assets/js/app.js') }}"></script>
    <script src="{{asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{asset('global_assets/js/demo_charts/echarts/light/lines/area_basic.js') }}"></script>
    <script src="{{asset('global_assets/js/demo_charts/echarts/light/pies/pie_basic.js') }}"></script>
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
    </script>
@endsection