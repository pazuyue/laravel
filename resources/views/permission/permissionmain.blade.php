<div class="table-responsive">
    <table class="table table-bordered">
        <caption>权限列表</caption>
        <thead>
        <tr>
            <th width="10%">名称</th>
            <th>显示名称</th>
            <th>描述</th>
            <th>生成时间</th>
            <th>修改时间</th>
            <th width="6%">状态</th>
            <th width="15%">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission -> name  }}</td>
                <td>{{ $permission -> display_name  }}</td>
                <td>{{ $permission -> description  }}</td>
                <td>{{ $permission -> created_at  }}</td>
                <td>{{ $permission -> updated_at  }}</td>
                @if(empty($permission -> deleted_at))
                    <td>正常</td>
                @else
                    <td>冻结</td>
                @endif
                <td>
                    <button type="button" class="clickauser btn btn-default btn-sm" url="/permission/permissionedit/{{ $permission -> id }}">修改</button>
                    @if(empty($permission -> deleted_at))
                        <button type="button" class="clickauser btn btn-danger btn-sm" url="/permission/permissiondel/{{ $permission -> id }}">冻结</button>
                    @else
                        <button type="button" class="clickauser btn btn-primary btn-sm" url="/permission/permissionhaw/{{ $permission -> id }}">解冻</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>