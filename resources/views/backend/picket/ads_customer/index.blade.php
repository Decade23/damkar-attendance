@extends('backend.layouts.app')

@section('topbar')
    @include('backend.picket.ads.layouts.topbar')
@endsection

@section('content')
    <section id="content" class="animated fadeIn">
        @include('flash')

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>Advertise Customer Lists
                </div>
                <input type="hidden" name="advertise_id" id="advertise_id" value="">
            </div>

            <div class="panel-menu">
                {{--                <div class="btn-group">--}}
                {{--                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Actions--}}
                {{--                        <span class="caret ml5"></span>--}}
                {{--                    </button>--}}
                {{--                    <ul class="dropdown-menu" role="menu">--}}
                {{--                        <li>--}}
                {{--                            <a href="javascript:void(0)" id="removeAll">Delete</a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}

                {{--                <a href="{{route('advertisement.customer.create')}}" class="btn btn-flat btn-success btn-sm">@lang('auth.index_create_link')</a>--}}
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed " id="users-table"
                       width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{--                        <th style="width: 100%"></th>--}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created By</th>
                        <th>
                            Created At
                        </th>
                        {{--                        <th>--}}
                        {{--                            Actions--}}
                        {{--                        </th>--}}
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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

        var table = $('#users-table').DataTable({
            aaSorting: [[0, 'desc']],
            iDisplayLength: 25,
            // stateSave     : true,
            responsive: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            dom: "<'dt-panelmenu clearfix'<'row'<'col-sm-6'l><'col-sm-6'f>>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'dt-panelfooter clearfix'<'row'<'col-sm-5'i><'col-sm-7'p>>>",
            pagingType: "full_numbers",
            ajax: {
                url: '{!! route('advertisement.customer.ajax.data') !!}',
                dataType: 'json',
                // data: function (d) {
                //     d.product_id = $('#product_id').val();
                // },
            },
            columns: [
                //{data: 'product_name', name: 'product_name'},

                {data: 'advertisment_customer_id', name: 'advertisment_customer_id', visible: false},
                // {
                //     data: 'checkbox', name: 'checkbox', orderable: false, searchable: false,
                //     checkboxes: true
                // },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'created_by', name: 'created_by'},
                {data: 'created_at', name: 'created_at'},
                // {
                //     data: 'action', name: 'action', orderable: false, searchable: false,
                //     fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                //         $("a", nTd).tooltip({container: 'body'});
                //     }
                // }
            ],
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i> @lang('auth.index_column')',
                    columns: '0, 2, 3, 4, 5, 6'
                }
            ]
        });


        //remove all products
        $('#removeAll').on('click', function (e) {

            e.preventDefault();

            $('.remove-form-list').empty();

            let idChecked = [];
            let rows_selected = table.column(1).checkboxes.selected();
            let form = $('#remove-form').closest('form');

            form.attr('action', '{{route('advertisement.destroy.bulk')}}');
            $('#method').val('DELETE');

            $.each(rows_selected, function (index, rowId) {

                $('.remove-form-list').append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId)
                );

                idChecked.push(rowId);
            });

            if (idChecked.length === 0) {
                alert('Please Check The Ads List Before Use This Button');
            } else {
                $('#message').text('Are you sure to delete all checked record?');
                $('#delete').modal({backdrop: 'static', keyboard: false})
                    .one('click', '#confirm', function () {
                        form.trigger('submit');
                        return false;
                    });

                $('#code').text('all selected');
            }

            return false;
        });

        $('.bulkAction').on('click', function (e) {

            e.preventDefault();

            $('.idList').empty();

            let idChecked = [];
            let rows_selected = table.column(1).checkboxes.selected();

            let form = $('#bulkForm').closest('form');

            form.attr('action', $(this).data('action'));
            form.attr('method', $(this).data('method'));

            if ($(this).data('method') === 'GET') {
                $('[name="_token"]').remove();
            }

            $.each(rows_selected, function (index, rowId) {

                $('.idList').append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId)
                );

                idChecked.push(rowId);
            });

            if (idChecked.length === 0) {
                alert('Please Check The Ads List Before Use This Button');
            } else {
                form.trigger('submit');
            }
        });
    </script>
@endpush
