<table class="table table-bordered">
    <caption>用户列表</caption>
    <thead>
    <tr>
        <th>用户名</th>
        <th>EMAIL</th>
        <th>生成时间</th>
        <th>修改时间</th>
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
        <td>
            <button type="button" class="btn btn-default btn-sm">修改</button>
            <button type="button" class="btn btn-danger btn-sm">删除</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>