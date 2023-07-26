@extends('backend.layouts.app')
@section('content')
    <section id="content" class="animated fadeIn">
        @include('flash')
        {{-- @if(Sentinel::inRole('sales') == true || Sentinel::inRole('root') == true || Sentinel::hasAccess(['dashboard.show'])) --}}
        @if( Sentinel::inRole('root') == true || Sentinel::hasAccess(['dashboard.show']) )
        <div class="panel panel-visible">
            <div class="panel-body">
                <h1>Dashboard</h1>
{{--                <div class="row mb10">--}}
{{--                    <div class="col-xs-3 col-sm-3 col-md-3">--}}
{{--                        <div class="panel bg-alert light of-h mb10">--}}
{{--                            <div class="pn pl20 p5">--}}
{{--                                <h4>Sales Today</h4>--}}
{{--                                <p>Rp {{$sales_today}}</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon-bg">--}}
{{--                                <i class="fa fa-bar-chart-o"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-3 col-sm-3 col-md-3">--}}
{{--                        <div class="panel bg-info light of-h mb10">--}}
{{--                            <div class="pn pl20 p5">--}}
{{--                                <h4>Unpaid Today</h4>--}}
{{--                                <p>{{$unpaid_today}} user</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon-bg">--}}
{{--                                <i class="fa fa-bar-chart-o"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-3 col-sm-3 col-md-3">--}}
{{--                        <div class="panel bg-danger light of-h mb10">--}}
{{--                            <div class="pn pl20 p5">--}}
{{--                                <h4>Paid Today</h4>--}}
{{--                                <p>{{$paid_today}} user</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon-bg">--}}
{{--                                <i class="fa fa-bar-chart-o"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-3 col-sm-3 col-md-3">--}}
{{--                        <div class="panel bg-warning light of-h mb10">--}}
{{--                            <div class="pn pl20 p5">--}}
{{--                                <h4>Top Agent</h4>--}}
{{--                                @if($top_agent == null)--}}
{{--                                <p>-</p>--}}
{{--                                @else--}}
{{--                                <p>{{$top_agent->agent->name}}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="icon-bg">--}}
{{--                                <i class="fa fa-bar-chart-o"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="admin-panels fade-onload">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4 br-r">--}}
{{--                            <h5 class="mt5 mbn ph10 pb5 br-b fw600">Top 10 Opportunities Customer--}}
{{--                                <!-- <small class="pull-right fw600 text-primary">View Report </small> -->--}}
{{--                            </h5>--}}
{{--                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">--}}
{{--                                <thead>--}}
{{--                                    <tr class="hidden">--}}
{{--                                        <th>Name</th>--}}
{{--                                        <th>Phone</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($opportunitiesCustomer as $opportunities)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <i class="fa fa-circle text-warning fs8 pr15"></i>--}}
{{--                                            <span>{{$opportunities->user->name}}</span>--}}
{{--                                        </td>--}}
{{--                                        <td>{{$opportunities->user->phone}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 br-r">--}}
{{--                            <h5 class="mt15 mbn ph10 pb5 br-b fw600">Top 10 Paid Customer--}}
{{--                                <!-- <small class="pull-right fw600 text-primary">View Report </small> -->--}}
{{--                            </h5>--}}
{{--                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">--}}
{{--                                <thead>--}}
{{--                                    <tr class="hidden">--}}
{{--                                        <th>Name</th>--}}
{{--                                        <th>Phone</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($paidCustomer as $paid)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <i class="fa fa-circle text-warning fs8 pr15"></i>--}}
{{--                                            <span>{{$paid->customer->name}}</span>--}}
{{--                                        </td>--}}
{{--                                        <td>{{$paid->customer->phone}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 br-r">--}}
{{--                            <h5 class="mt15 mbn ph10 pb5 br-b fw600">Top 10 Unpaid Customer--}}
{{--                                <!-- <small class="pull-right fw600 text-primary">View Report </small> -->--}}
{{--                            </h5>--}}
{{--                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">--}}
{{--                                <thead>--}}
{{--                                    <tr class="hidden">--}}
{{--                                        <th>Name</th>--}}
{{--                                        <th>Phone</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($unpaidCustomer as $unpaid)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <i class="fa fa-circle text-warning fs8 pr15"></i>--}}
{{--                                            <span>{{$unpaid->customer->name}}</span>--}}
{{--                                        </td>--}}
{{--                                        <td>{{$unpaid->customer->phone}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-12">--}}
{{--                    <div>--}}
{{--                        <h3 class="box-title">Report</h3>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-3">--}}
{{--                        <select id="zeroSelector" class="form-control chart select select2-hidden-accessible" tabindex="-1" aria-hidden="true">--}}
{{--                            <option value="income">Income</option>--}}
{{--                            <option value="paidunpaid">Order Paid / Unpaid</option>--}}
{{--                            <option value="total">Order Total</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-3">--}}
{{--                        <select id="firstSelector" class="form-control chart select select2-hidden-accessible" tabindex="-1" aria-hidden="true">--}}
{{--                            <option value="daily">Daily</option>--}}
{{--                            <option value="weekly">Weekly</option>--}}
{{--                            <option value="monthly">Monthly</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-3">--}}
{{--                        <select id="secondSelector" class="form-control chart select select2-hidden-accessible" tabindex="-1" aria-hidden="true">--}}
{{--                            <option value="1">January</option>--}}
{{--                            <option value="2">February</option>--}}
{{--                            <option value="3">March</option>--}}
{{--                            <option value="4">April</option>--}}
{{--                            <option value="5">May</option>--}}
{{--                            <option value="6">June</option>--}}
{{--                            <option value="7">July</option>--}}
{{--                            <option value="8">August</option>--}}
{{--                            <option value="9">September</option>--}}
{{--                            <option value="10">October</option>--}}
{{--                            <option value="11">November</option>--}}
{{--                            <option value="12">December</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-3 thirdSelector">--}}
{{--                        <select id="thirdSelector" class="form-control chart select select2-hidden-accessible" tabindex="-1" aria-hidden="true">--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-12 scrollGraph">--}}
{{--                        <div class="chart" id="revenue-chart" style="height: 300px;"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        @else
            <div class="panel panel-visible">
                <div class="panel-body">

                    <p>Selamat Datang, {{ Sentinel::getUser()->name }}
                    </p>
                </div>
            </div>
        @endif
    </section>
@stop

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('theme/app/vendor/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('theme/app/vendor/plugins/datatables/media/css/dataTables.plugins.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2-bootstrap.css')}}">
    <style type="text/css">
        /*scroll bar untuk graphic*/
        .scrollGraph {
            overflow-x: scroll;
            overflow-y: scroll;
        }

        .scrollGraph .chart {
            width: 1000px;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        .tabBorder {
            border: 1px solid #ccc;
        }

        div.tab button.active {
            border-top: 3px solid #61e1c9;
            background-color: #fff;
            border-bottom: 0px;
        }

        .NoBorderTop {
            border-top: 0px;
        }

        /* Style the buttons inside the tab */
        div.tab button {
            background-color: inherit;
            outline: none;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        div.tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        div.tab button.active {
            background-color: #ccc;
        }

        .styleAktifitasTerbaru {
            margin-bottom: 10px;
            border-bottom: 2px solid #ec8f8f;
            padding-bottom: 10px;
        }

        .warnaBorderPemisah {
            border-bottom: 1px solid #d8cccc !important;
        }

        .glyphicon {
            font-size: 50px;
        }
    </style>
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{url('plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/Buttons/js/buttons.bootstrap.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/Buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/Checkboxes/dataTables.checkboxes.min.js')}}"></script>
    <script src="{{url('plugins/datatables/extensions/Pagination/full_numbers_no_ellipses.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{url('plugins/jquery-number/jquery.number.min.js')}}"></script>
    <script src="{{url('plugins/select2/js/select2.full.js')}}"></script>
    <!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
    <script src="{{url('theme/app/vendor/plugins/highcharts/highcharts.js')}}"></script>

    <script type="text/javascript">
        // $('#zeroSelector').select2({
        //     theme: "bootstrap",
        //     placeholder: "Select",
        //     width: '100%',
        //     containerCssClass: ':all:',
        // });
        // $('#firstSelector').select2({
        //     theme: "bootstrap",
        //     placeholder: "Select",
        //     width: '100%',
        //     containerCssClass: ':all:',
        // });
        // $('#secondSelector').select2({
        //     theme: "bootstrap",
        //     placeholder: "Select",
        //     width: '100%',
        //     containerCssClass: ':all:',
        // });
        // $('#thirdSelector').select2({
        //     theme: "bootstrap",
        //     placeholder: "Select",
        //     width: '100%',
        //     containerCssClass: ':all:',
        // });
    </script>

    <!-- Product And Services -->
    <script>
        // var harian, mingguan, bulanan;
        // var d = new Date();
        // var currentMonth = d.getMonth() + 1;
        // var currentYear = d.getFullYear();
        //
        // $('#secondSelector option[value=' + currentMonth +']').prop('selected', true).change();

        {{--for(var loopYear = {{$minYear}}; loopYear <= {{$maxYear}}; loopYear++){--}}
        {{--    if(loopYear == currentYear){--}}
        {{--        $('#thirdSelector').append($("<option></option>").attr("value", loopYear).text(loopYear).prop('selected', true));--}}
        {{--    }--}}
        {{--    else{--}}
        {{--        $('#thirdSelector').append($("<option></option>").attr("value", loopYear).text(loopYear));--}}
        {{--    }--}}
        {{--}--}}

        // getchartdata();

        {{--$('#zeroSelector').on('change', function(){--}}
        {{--    getchartdata();--}}
        {{--});--}}

        {{--$('#secondSelector').on('change', function(){--}}
        {{--    getchartdata();--}}
        {{--});--}}

        {{--$('#thirdSelector').on('change', function(){--}}
        {{--    getchartdata();--}}
        {{--});--}}

        {{--$("#firstSelector").on('change', function(e) {--}}
        {{--    document.getElementById("secondSelector").options.length = 0;--}}
        {{--    var valueSelector = e.target.value;--}}
        {{--    if(valueSelector == "daily"){--}}
        {{--        document.getElementById("secondSelector").options[0] = new Option("January", "1");--}}
        {{--        document.getElementById("secondSelector").options[1] = new Option("February", "2");--}}
        {{--        document.getElementById("secondSelector").options[2] = new Option("March", "3");--}}
        {{--        document.getElementById("secondSelector").options[3] = new Option("April", "4");--}}
        {{--        document.getElementById("secondSelector").options[4] = new Option("May", "5");--}}
        {{--        document.getElementById("secondSelector").options[5] = new Option("June", "6");--}}
        {{--        document.getElementById("secondSelector").options[6] = new Option("July", "7");--}}
        {{--        document.getElementById("secondSelector").options[7] = new Option("August", "8");--}}
        {{--        document.getElementById("secondSelector").options[8] = new Option("September", "9");--}}
        {{--        document.getElementById("secondSelector").options[9] = new Option("October", "10");--}}
        {{--        document.getElementById("secondSelector").options[10] = new Option("November", "11");--}}
        {{--        document.getElementById("secondSelector").options[11] = new Option("December", "12");--}}
        {{--        $('#secondSelector option[value=' + currentMonth +']').prop('selected', true).change();--}}
        {{--        $('.thirdSelector').show();--}}
        {{--    }--}}
        {{--    else if(valueSelector == "weekly"){--}}
        {{--        document.getElementById("secondSelector").options[0] = new Option("January", "1");--}}
        {{--        document.getElementById("secondSelector").options[1] = new Option("February", "2");--}}
        {{--        document.getElementById("secondSelector").options[2] = new Option("March", "3");--}}
        {{--        document.getElementById("secondSelector").options[3] = new Option("April", "4");--}}
        {{--        document.getElementById("secondSelector").options[4] = new Option("May", "5");--}}
        {{--        document.getElementById("secondSelector").options[5] = new Option("June", "6");--}}
        {{--        document.getElementById("secondSelector").options[6] = new Option("July", "7");--}}
        {{--        document.getElementById("secondSelector").options[7] = new Option("August", "8");--}}
        {{--        document.getElementById("secondSelector").options[8] = new Option("September", "9");--}}
        {{--        document.getElementById("secondSelector").options[9] = new Option("October", "10");--}}
        {{--        document.getElementById("secondSelector").options[10] = new Option("November", "11");--}}
        {{--        document.getElementById("secondSelector").options[11] = new Option("December", "12");--}}
        {{--        $('#secondSelector option[value=' + currentMonth +']').prop('selected', true).change();--}}
        {{--        $('.thirdSelector').show();--}}
        {{--    }--}}
        {{--    else if(valueSelector == "monthly"){--}}
        {{--        --}}{{--for(var loopYear = {{$minYear}}; loopYear <= {{$maxYear}}; loopYear++){--}}
        {{--        --}}{{--    if(loopYear == currentYear){--}}
        {{--        --}}{{--        $('#secondSelector').append($("<option></option>").attr("value", loopYear).text(loopYear).prop('selected', true));--}}
        {{--        --}}{{--    }--}}
        {{--        --}}{{--    else{--}}
        {{--        --}}{{--        $('#secondSelector').append($("<option></option>").attr("value", loopYear).text(loopYear));--}}
        {{--        --}}{{--    }--}}
        {{--        --}}{{--}--}}
        {{--        $('#secondSelector option[value=' + currentYear +']').prop('selected', true).change();--}}
        {{--        $('.thirdSelector').hide();--}}
        {{--    }--}}
        {{--});--}}

        {{--function getchartdata(){--}}
        {{--    var zeroSelector = $('#zeroSelector').val();--}}
        {{--    var firstSelector = $('#firstSelector').val();--}}
        {{--    var secondSelector = $('#secondSelector').val();--}}
        {{--    var thirdSelector = "";--}}
        {{--    var path = "";--}}

        {{--    if(firstSelector == "daily"){--}}
        {{--        path = "{!! route('dashboard.getchartdata.daily') !!}";--}}
        {{--        thirdSelector = $('#thirdSelector').val();--}}
        {{--    }--}}
        {{--    else if(firstSelector == "weekly"){--}}
        {{--        path = "{!! route('dashboard.getchartdata.weekly') !!}";--}}
        {{--        thirdSelector = $('#thirdSelector').val();--}}
        {{--    }--}}
        {{--    else if(firstSelector == "monthly"){--}}
        {{--        path = "{!! route('dashboard.getchartdata.monthly') !!}";--}}
        {{--    }--}}

        {{--    $.ajax({--}}
        {{--        url: path,--}}
        {{--        type:"post",--}}
        {{--        data : {--}}
        {{--            _token   : '{!!csrf_token()!!}',--}}
        {{--            zeroSelector : zeroSelector,--}}
        {{--            secondSelector : secondSelector,--}}
        {{--            thirdSelector : thirdSelector,--}}
        {{--        },--}}
        {{--        success:function(data){--}}
        {{--            $('#revenue-chart').empty();--}}
        {{--            if(zeroSelector == "paidunpaid"){--}}
        {{--                $('#revenue-chart').highcharts({--}}
        {{--                    chart: {--}}
        {{--                        type : 'line',--}}
        {{--                    },--}}
        {{--                    title: {--}}
        {{--                        text: 'Order Paid / Unpaid'--}}
        {{--                    },--}}
        {{--                    xAxis: {--}}
        {{--                        categories : data.x--}}
        {{--                    },--}}
        {{--                    series: [{--}}
        {{--                        name: 'Order Paid',--}}
        {{--                        data: data.item1--}}
        {{--                    },{--}}
        {{--                        name: 'Order Unpaid',--}}
        {{--                        data: data.item2--}}
        {{--                    }],--}}
        {{--                });--}}
        {{--            }--}}
        {{--            else if(zeroSelector == "total"){--}}
        {{--                $('#revenue-chart').highcharts({--}}
        {{--                    chart: {--}}
        {{--                        type : 'line',--}}
        {{--                    },--}}
        {{--                    title: {--}}
        {{--                        text: 'Order Total'--}}
        {{--                    },--}}
        {{--                    xAxis: {--}}
        {{--                        categories : data.x--}}
        {{--                    },--}}
        {{--                    series: [{--}}
        {{--                        name: 'Order Total',--}}
        {{--                        data: data.item1--}}
        {{--                    }],--}}
        {{--                });--}}
        {{--            }--}}
        {{--            else if(zeroSelector == "income"){--}}
        {{--                $('#revenue-chart').highcharts({--}}
        {{--                    chart: {--}}
        {{--                        type : 'line',--}}
        {{--                    },--}}
        {{--                    title: {--}}
        {{--                        text: 'Income'--}}
        {{--                    },--}}
        {{--                    xAxis: {--}}
        {{--                        categories : data.x--}}
        {{--                    },--}}
        {{--                    series: [{--}}
        {{--                        name: 'Income',--}}
        {{--                        data: data.item1--}}
        {{--                    }],--}}
        {{--                });--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}
    </script>
@endpush

