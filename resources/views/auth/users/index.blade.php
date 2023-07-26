@extends('backend.layouts.app')

@section('content')
    <section id="content" class="animated fadeIn">
        @include('flash')

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('auth.index_users')
                </div>
            </div>

            <div class="panel-menu">
                <a href="{{route('users.create')}}" class="btn btn-flat btn-success btn-sm">@lang('auth.index_create_link')</a>
            </div>
            <table class="table table-striped table-bordered table-hover table-condensed" id="users-table" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('auth.index_name_th')</th>
                    <th>@lang('auth.index_email_th')</th>
                    <th>@lang('auth.index_roles')</th>
                    <th>@lang('auth.index_last_login')</th>
                    <th>@lang('auth.index_status_th')</th>
                    <th>@lang('auth.index_created_at')</th>
                    <th>@lang('auth.index_updated_at')</th>
                    <th>@lang('auth.index_action_th')</th>
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
                dom           : "<'dt-panelmenu clearfix'<'row'<'col-sm-2'B><'col-sm-4'l><'col-sm-6'f>>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'dt-panelfooter clearfix'<'row'<'col-sm-5'i><'col-sm-7'p>>>",
                pagingType    : "full_numbers",
                ajax          : {
                    url     : '{!! route('users.ajax.data') !!}',
                    dataType: 'json'
                },
                columns       : [
                    {data: 'id', name: 'user.id'},
                    {
                        data: 'name', name: 'user.name'
                    },
                    {data: 'email', name: 'email'},
                    {data: 'role', name: 'roles.name', defaultContent: ''},
                    {data: 'last_login', name: 'last_login'},
                    {
                        data: 'status', name: 'status', fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $("a", nTd).tooltip({container: 'body'});
                        }
                    },
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {
                        data         : 'action', name: 'action', orderable: false, searchable: false,
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $("a", nTd).tooltip({container: 'body'});
                        }
                    }
                ],
                buttons       : [
                    {
                        extend : 'colvis',
                        text   : '<i class="fa fa-columns"></i> @lang('auth.index_column')',
                        columns: '0, 2, 3, 4, 5, 6, 7'
                    }
                ]
            });
        });
    </script>
@endpush
