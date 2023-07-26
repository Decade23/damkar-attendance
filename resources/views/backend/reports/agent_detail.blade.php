@extends('backend.layouts.app')

{{-- @section('topbar')
    @include('backend.reports.topbar')
@endsection --}}

@section('content')
    <section id="content" class="animated fadeIn">
        @include('flash')
        
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>Agent sales report ( {{$agent->name}} ) at Week {{Request()->week}}
                </div>
            </div> 

            <table class="table table-striped table-bordered table-hover table-condensed" id="users-table" width="100%">
                <thead>
                <tr>
                    <th>Product Name</th>
                    
                     <th>Qty
                        <input type="hidden" id="startDate" value="{{Request()->startDate}}">
                        <input type="hidden" id="endDate" value="{{Request()->endDate}}">
                        <input type="hidden" id="agent_id" value="{{Request()->agent_id}}">
                     </th>
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
                    url     : '{!! route('reports.agent_details.ajax.data') !!}',
                    dataType: 'json',
                    data : function(d) {
                        d.startDate = $('#startDate').val();
                        d.endDate = $('#endDate').val();
                        d.agent_id = $('#agent_id').val();
                    },
                },
                columns       : [
                    //{data: 'product_name', name: 'product_name'},
                   
                    {data: 'product_name', name: 'product_name'},
                    {data: 'qty', name: 'qty'},
                    
                ],
                buttons       : [
                    // {
                    //     extend : 'colvis',
                    //     text   : '<i class="fa fa-columns"></i> @lang('auth.index_column')',
                    //     columns: '0, 2, 3, 4, 5, 6, 7'
                    // }
                ]
            });

            

            // $('#choose').on('click', function (e) {
            //     e.preventDefault();
            //     window.location.href = "{{ url()->route('reports.agents.index')}}?month=" + $('#month').val() + "&year="  + $('#year').val();
                
            // });
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
