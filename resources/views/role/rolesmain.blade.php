<div class="table-responsive">
    <table class="table table-bordered">
        <caption>角色列表</caption>
        <thead>
        <tr>
            <th>名称</th>
            <th>显示名称</th>
            <th>描述</th>
            <th>生成时间</th>
            <th>修改时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role -> name  }}</td>
                <td>{{ $role -> display_name  }}</td>
                <td>{{ $role -> description  }}</td>
                <td>{{ $role -> created_at  }}</td>
                <td>{{ $role -> updated_at  }}</td>
                @if(empty($role -> deleted_at))
                    <td>正常</td>
                @else
                    <td>冻结</td>
                @endif
                <td>
                    <button type="button" class="clickauser btn btn-success btn-sm" url="/role/permissionrole/{{ $role -> id }}">绑定权限</button>
                    <button type="button" class="clickauser btn btn-default btn-sm" url="/role/roleedit/{{ $role -> id }}">修改</button>
                    @if(empty($role -> deleted_at))
                        <button type="button" class="clickauser btn btn-danger btn-sm" url="/role/roleedel/{{ $role -> id }}">冻结</button>
                    @else
                        <button type="button" class="clickauser btn btn-primary btn-sm" url="/role/rolethaw/{{ $role -> id }}">解冻</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>