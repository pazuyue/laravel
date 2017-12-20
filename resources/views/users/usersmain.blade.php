<div class="table-responsive">
    <table class="table table-bordered">
        <caption>用户列表</caption>
        <thead>
        <tr>
            <th>用户名</th>
            <th>EMAIL</th>
            <th>生成时间</th>
            <th>修改时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user -> name  }}</td>
                <td>{{ $user -> email  }}</td>
                <td>{{ $user -> created_at  }}</td>
                <td>{{ $user -> updated_at  }}</td>
                @if(empty($user -> deleted_at))
                    <td>正常</td>
                @else
                    <td>冻结</td>
                @endif
                <td>
                    <button type="button" class="clickauser btn btn-default btn-sm" url="/user/useredit/{{ $user -> id }}">修改</button>
                    @if(empty($user -> deleted_at))
                        <button type="button" class="clickauser btn btn-danger btn-sm" url="/user/useredel/{{ $user -> id }}">冻结</button>
                    @else
                        <button type="button" class="clickauser btn btn-primary btn-sm" url="/user/useredel/{{ $user -> id }}">解冻</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>