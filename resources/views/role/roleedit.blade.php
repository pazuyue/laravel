<div id="message"></div>
<form class="form-horizontal" role="form" id="form" action="{{url("/role/roleedit")}}" method="POST">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">角色名称</label>
        <div class="col-sm-10">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $role -> id  }}">
            <input type="text" class="form-control" id="name" name="name" placeholder="请输入角色名称" value="{{ $role -> name  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">显示名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="请输入显示名称" value="{{ $role -> display_name  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name="description" placeholder="请输入描述" value="{{ $role -> description  }}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="formadd" class="btn btn-default">保存</button>
        </div>
    </div>
</form>
<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>