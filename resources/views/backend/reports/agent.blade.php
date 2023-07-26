@extends('backend.layouts.app')

@section('topbar')
    @include('backend.reports.topbar')
@endsection

@section('content')
    <section id="content" class="animated fadeIn">
        @include('flash')
        
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>Reports
                </div>
            </div>  
            <div class="panel-menu">
                <form action="" class="form-inline" style="width: 100%;" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="year" class="input-sm form-control select_2" style="width: 100%;" id="year">
                                <option value="" ></option>
                                @foreach($years as $year)
                                <option value="{{$year}}" {{ isset(request()->year) ? request()->year == $year ? 'selected' : '' : $year == $yearNow ? 'selected' : ''  }} >{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="month" class="input-sm form-control select_2" style="width: 100%;" id="month">
                                <option value="" ></option>
                                @foreach($months as $key => $month)
                                <option value="{{$key}}" {{ isset(request()->month) ?  request()->month == $key ? 'selected' : '' : $key == $monthNow ? 'selected' : ''  }} >{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" id="choose" class="btn btn-success btn-sm">Search</button>
                    </div>
                </form>
            </div>

            <table class="table table-striped table-bordered table-hover table-condensed" id="users-table" width="100%">
                <thead>
                <tr>
                    <th>Agent ID</th>
                    <th>Agent Name</th>
                    @for ($i = $startWeekNumber ; $i <= $endWeekNumber-1; $i++)
                     <th>Week {{$i}}</th>
                     <th>Range Date {{$i}}</th>
                    @endfor
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </section>
@stop

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('theme/app/vendor/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('theme/app/vendor/plugins/datatables/media/css/dataTables.plugins.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css')}}">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2-bootstrap.css')}}">
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
    
    <script>
        $(function () {

            var table = $('#users-table').DataTable({
                aaSorting     : [[0, 'desc']],
                iDisplayLength: 25,
                // stateSave     : true,
                responsive    : true,
                fixedHeader   : true,
                processing    : true,
                serverSide    : true,
                dom           : "<'dt-panelmenu clearfix'<'row'<'col-sm-6'l><'col-sm-6'f>>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'dt-panelfooter clearfix'<'row'<'col-sm-5'i><'col-sm-7'p>>>",
                pagingType    : "full_numbers",
                ajax          : {
                    url     : '{!! route('reports.agents.ajax.data') !!}',
                    dataType: 'json',
                    data: function (d) {
                        d.month = $('#month').val();
                        d.year = $('#year').val();
                    },
                },
                columns       : [
                    //{data: 'product_name', name: 'product_name'},
                   
                    {data: 'agent_id', name: 'agent_id', visible:false},
                    {data: 'agent_name', name: 'agent_name'},
                    @for ($i = $startWeekNumber ; $i <= $endWeekNumber-1; $i++)
                    {data: 'week{{$i}}', name: 'week{{$i}}',

                        "render": function ( data, type, row ) {
                            console.log(row.rangeDate{{$i}})
                            if(data === 0) {
                                return data;
                            }

                            return '<a href="{{route('reports.agent_details.index')}}?agent_id='+row.agent_id+'&'+decodeURI(row.rangeDate{{$i}})+'&week={{$i}} " target="blank_">'+data+'</a> ';
                        },

                    },

                    {data: 'rangeDate{{$i}}', name: 'rangeDate{{$i}}', visible : false

                        

                    },
                    @endfor
                ],
                buttons       : [
                    // {
                    //     extend : 'colvis',
                    //     text   : '<i class="fa fa-columns"></i> @lang('auth.index_column')',
                    //     columns: '0, 2, 3, 4, 5, 6, 7'
                    // }
                ]
            });

            

            $('#choose').on('click', function (e) {
                e.preventDefault();
                window.location.href = "{{ url()->route('reports.agents.index')}}?month=" + $('#month').val() + "&year="  + $('#year').val();
                
            });
        });
    </script>

    <script src="{{url('plugins/select2/js/select2.full.js')}}"></script>
    
    <script type="text/javascript">
       
        $(function () {
            $('form select').select2({
                theme            : "bootstrap",
                placeholder      : "Select",
                containerCssClass: ':all:',
            });
        });
    </script>
@endpush
