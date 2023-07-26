@extends('backend.layouts.app')

@section('topbar')
    @include('backend.report_damkar.layouts.topbar')
@endsection

@section('content')
    <section id="content" class="animated fadeIn">
        @include('flash')

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>Report Picket
                </div>
            </div>

            <div class="panel-menu">
                <div class="row">
                    <div class="col-md-3">
                        <label for="date_picket" class="control-label">Date Picket
                            <span style="color: red">*</span></label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group input-group-sm date">
                                <input onchange="changeHandlerDatePicker()" type="text" name="date_picket" id="date_picket"
                                       value="{{old('date_picket', date('Y-m-d'))}}"
                                       class="form-control input-sm" placeholder="Select Date ...*"
                                       readonly>
                                <label class="input-group-addon input-sm" for="date_picket">
                                    <i class="fa fa-calendar"></i>
                                </label>
                            </div>
                            {!! $errors->first('date_picket', '<em for="date_picket" class="text-danger">:message</em>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body pb5" style="width: 100%">
                <div class="row" id="attendance-aggregate-lists">
                    @foreach($attendance_aggrerate as $aa)
                        <div class="col-md-6 h3"><label class="text-capitalize">Total {{$aa->group_picket}}</label>
                            <span class="text-primary cursor"
                                  onclick="loadData('{{$aa->group_picket}}')">: {{$aa->total}}</span></div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5>Total Picket</h5>
                        <table
                            class="table table-striped table-bordered table-hover table-condensed table-responsive display nowrap"
                            id="attendance-table" width="100%">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Group Piket</th>
                                <th>Keterangan Picket</th>
                            </tr>
                            </thead>
                            <tbody id="attendance-list">
                            @foreach($attendance as $att)
                                <tr>
                                    <td>{{$att->name_user}}</td>
                                    <td>Anggota</td>
                                    <td>{{$att->group_picket}} - {{strtoupper($att->id_group_picket)}}</td>
                                    <td>{{$att->desc_picket}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <form action="" method="GET" id="bulkForm" class="hide">
        {!! csrf_field() !!}
        <div class="idList"></div>

        <button type="submit" class="hide"></button>
    </form>
@stop

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('theme/app/vendor/plugins/datatables/media/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('theme/app/vendor/plugins/datatables/media/css/dataTables.plugins.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables/extensions/Buttons/css/buttons.bootstrap.min.css')}}">
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

    <script src="{{url('plugins/jquery-number/jquery.number.min.js')}}"></script>

    <script>

        $(function () {
            $('#date_picket').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0"
            });
        });

        function changeHandlerDatePicker() {
            const date = $('#date_picket').val();
            const countRow = $('#attendance-table thead tr th').length
            $.ajax({
                url: `{!! route('report_damkar.ajax.data_attendance_aggregate') !!}`,
                data: {
                    date
                },
                method: 'GET',
                dataType: 'json',
                beforeSend: function () {
                    $('#attendance-aggregate-lists').html(`<div class="col-md-12 h5 text-muted"> loading... </div>`)
                    $('#attendance-table tbody')
                        .html(
                            `<tr class="text-center">
                                <td colspan="${countRow}" class="text-muted">loading...</td>>
                            </tr>`
                        )
                }
            })
                .done(function (result) {
                    attendanceAggregate(result.attendance_aggrerate)
                    attendanceLists(result.attendance)

                })
        }

        function attendanceAggregate(data) {
            const elAttendanceAggregate = $('#attendance-aggregate-lists')

            if (data.length > 0) {
                $(elAttendanceAggregate).html('');
                $.each(data, function (index, att) {
                    $(elAttendanceAggregate)
                        .append(
                            `<div class="col-md-6 h3"><label class="text-capitalize">Total ${att.group_picket}</label>
                            <span class="text-primary cursor"
                                  onclick="loadData('${att.group_picket}')">: ${att.total}</span></div>`
                        )
                })
            } else {
                $(elAttendanceAggregate).html(`<div class="col-md-12 h5 text-muted text-info"> no data found. </div>`);
            }
        }

        function attendanceLists(result) {
            const countRow = $('#attendance-table thead tr th').length

            $('#attendance-table tbody')
                .html(``)

            if ( result.length > 0 ) {
                $.each(result, function (index, att) {
                    $('#attendance-table tbody')
                        .append(
                            `<tr>
                                <td>${att.name_user}</td>
                                <td>Anggota</td>
                                <td>${att.group_picket} - ${att.id_group_picket.toUpperCase()}</td>
                                <td>${att.desc_picket}</td>
                            </tr>`
                        )
                })
            } else {
                $('#attendance-table tbody')
                    .html(
                        `<tr class="text-center">
                                <td colspan="${countRow}" class="text-info">no data picket found.</td>>
                            </tr>`
                    )
            }
        }

        function loadData(group_picket) {
            let date = $('#date_picket').val();
            const countRow = $('#attendance-table thead tr th').length
            $.ajax({
                url: `{!! route('report_damkar.ajax.data') !!}`,
                data: {
                    date,
                    group_picket
                },
                method: 'GET',
                dataType: 'json',
                beforeSend: function () {
                    $('#attendance-table tbody')
                        .html(
                            `<tr class="text-center">
                                <td colspan="${countRow}" class="text-muted">loading...</td>>
                            </tr>`
                        )
                }
            })
                .done(function (result) {
                if ( result.length > 0 ) {
                    $.each(result, function (index, att) {
                        $('#attendance-table tbody')
                            .html(
                                `<tr>
                                <td>${att.name_user}</td>
                                <td>Anggota</td>
                                <td>${att.group_picket} - ${att.id_group_picket.toUpperCase()}</td>
                                <td>${att.desc_picket}</td>
                            </tr>`
                            )
                    })
                } else {
                    $('#attendance-table tbody')
                        .html(
                            `<tr class="text-center">
                                <td colspan="${countRow}" class="text-info">no data picket found.</td>>
                            </tr>`
                        )
                }

            })
        }
    </script>
@endpush
