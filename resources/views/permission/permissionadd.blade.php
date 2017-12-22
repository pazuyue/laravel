<div id="message"></div>
<form class="form-horizontal" role="form" id="form" action="{{url("/permission/permissionadd")}}" method="POST">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">权限KEY</label>
        <div class="col-sm-10">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="text" class="form-control" id="name" name="name" placeholder="请输入权限KEY">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">显示名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="请输入显示名称">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name="description" placeholder="请输入描述">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="formadd" class="btn btn-default">保存</button>
        </div>
    </div>
</form>
<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>