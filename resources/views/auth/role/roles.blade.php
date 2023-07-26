<div class="checkbox checkbox-success">
    <input type="checkbox" value="ok" name="acl_all" class="styled acl" id="acl-all" style="margin-left: 0;" {{ old('acl_all') || array_key_exists('acl.all', $permissions) ? 'checked' : ''}}>
    <label for="acl-all">Checked All</label>
</div>

<table class="table table-bordered table-hover table-striped table-condensed" id="acl-table" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center" style="vertical-align: middle">@lang('global.module_name')</th>
        <th class="text-center" width="80">@lang('global.create')</th>
        <th class="text-center" width="80">@lang('global.update')</th>
        <th class="text-center" width="80">@lang('global.view')</th>
        <th class="text-center" width="80" style="color: red">@lang('global.delete')</th>
        <th class="text-center">@lang('global.miscellaneous')</th>
    </tr>
    </thead>

    <tbody>

    <!-- Dashboard -->
    <tr>
        <td>Dashboard</td>
        <td class="text-center">&nbsp;</td>
        <td class="text-center">&nbsp;</td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="dashboard_show" {{ old('dashboard_show') || array_key_exists('dashboard.show', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <!-- Users -->
    <tr>
        <td>{{trans('auth.form_user_heading')}}</td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="user_create" {{ old('user_create') || array_key_exists('user.create', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="user_edit" {{ old('user_edit') || array_key_exists('user.edit', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="user_show" {{ old('user_show') || array_key_exists('user.show', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="user_destroy" {{ old('user_destroy') || array_key_exists('user.destroy', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td>
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" id="user_status" class="styled acl" name="user_status" {{ old('user_status') || array_key_exists('user.status', $permissions) ? 'checked' : ''}}>
                <label for="users_manage">@lang('auth.index_status_th')</label>
            </div>
        </td>
    </tr>

    <!-- Roles -->
    <tr>
        <td>{{trans('auth.index_roles')}}</td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="role_create" {{ old('role_create') || array_key_exists('role.create', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="role_edit" {{ old('role_edit') || array_key_exists('role.edit', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="role_show" {{ old('role_show') || array_key_exists('role.show', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="role_destroy" {{ old('role_destroy') || array_key_exists('role.destroy', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>

    <!-- Reports -->
    <tr>
        <td>Report Picket</td>
        <td class="text-center"> </td>
        <td class="text-center"></td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="report_damkar_show" {{ old('report_damkar_show') || array_key_exists('report_damkar.show', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center"> </td>
        <td>&nbsp;</td>
    </tr>


    <!-- Picket -->
    <tr>
        <td>Picket</td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="picket_create" {{ old('picket_create') || array_key_exists('picket.create', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="picket_edit" {{ old('picket_edit') || array_key_exists('picket.edit', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="picket_show" {{ old('picket_show') || array_key_exists('picket.show', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td class="text-center">
            <div class="checkbox checkbox-success">
                <input type="checkbox" value="ok" class="styled acl" name="picket_destroy" {{ old('picket_destroy') || array_key_exists('picket.destroy', $permissions) ? 'checked' : ''}}>
                <label></label>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>

    </tbody>
</table>

<!-- DataTables -->
<link rel="stylesheet" href="{{url('plugins/datatables/media/css/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{url('plugins/datatables/extensions/Responsive/css/responsive.dataTables.css')}}">
<link rel="stylesheet" href="{{url('plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css')}}">
<script src="{{url('plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{url('plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js')}}"></script>

<script>
    $(function () {
        var oTable = $('#acl-table').DataTable({
            aaSorting  : [[0, 'asc']],
            stateSave  : true,
            bPaginate  : false,
            bInfo      : false,
            responsive : true,
            processing : true,
            bFilter    : false,
            fixedHeader: true,
            @if(Session::get('locale') == 'cn')
            language   : {url: '{{url('plugins/datatables/language/chinese.json')}}'},
            @endif
            columns    : [
                {orderable: true, searchable: true},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},

            ]

        });
    });

    $('#acl-all').on('click', function () {
        var all = $('#acl-all');
        if (all.is(":checked")) {
            $('.acl').prop('checked', true);
        } else {
            $('.acl').prop('checked', false);
        }
    });
</script>
