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
                    <span class="glyphicon glyphicon-tasks"></span>Advertise Details
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

                {{--                <a href="{{route('advertisement.create')}}" class="btn btn-flat btn-success btn-sm">@lang('auth.index_create_link')</a>--}}
                <a href="{{route('advertisement.edit', $dataDb->advertisement_id)}}"
                   class="btn btn-flat btn-info btn-sm">Edit</a>
            </div>

            <div class="panel-body pb5">

                <h6>Data Customer</h6>

                <h4>Customer Email: {{$dataDb->customer->email}}</h4>
                <p class="text-muted">
                    Created By: <b>{{ $dataDb->customer->created_by }}</b>
                    <br/>Created At: <b>{{ $dataDb->customer->created_at }}</b>
                    <br/> Customer Name: <b>{{ $dataDb->customer->name }}</b>
                    <br/>Customer Phone: <b>{{ $dataDb->customer->phone }}</b>
                    <br/>Customer Address: <b>{{ $dataDb->customer->address }}</b>
                </p>

                <hr class="short br-lighter">

                {{-- data Advertise--}}
                <h6>Data Advertise</h6>

                <h4>Title: {{$dataDb->title}}</h4>
                <p class="text-muted">
                    Price: <b>{{ number_format($dataDb->price->price) }}</b>
                    <br/> Status
                    Payment: {!! \App\Models\PalembangKito\AdvertisementPayment::getLabelDetailStatus($dataDb) !!}
                    <br/> Position: <b>{{ $dataDb->price->position }}</b>
                    <br/> Start When:
                    <b>{{ $dataDb->start_date .' until '. $dataDb->end_date .' (' .\Carbon\Carbon::parse($dataDb->end_date)->diffInDays($dataDb->start_date) . ' Days)' }} </b>
                    <br/> Categories: <b>{{ $dataDb->categories->name }}</b>
                    <br/> Desc:
                </p>
                {!! $dataDb->desc !!}

            </div>
            <div class="panel-footer">
                <input type="hidden" value="{{old('previousUrl', url()->previous())}}" name="previousUrl">
                <a href="{{old('previousUrl', url()->previous())}}" class="btn btn-flat btn-default btn-sm"><i
                            class="fa fa-reply"></i> Back
                </a>

                <div class="clearfix"></div>
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

@endpush

@push('scripts')

    <script src="{{url('plugins/jquery-number/jquery.number.min.js')}}"></script>

    <script>
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
            let rows_selected = [{!! $dataDb->advertisement_id !!}]; //change into id details

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
