<div id="message"></div>
<form class="form-horizontal" role="form" id="form" action="{{url("/role/permissionrole")}}" method="POST">
    <div class="form-group">
        <label for="firstname" class="col-sm-6 text-left">角色名称：{{$role->display_name}}</label>
        <div class="col-sm-6">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="roleID" value="{{$role->id}}">
            <input type="hidden" name="_method" value="PUT">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <label for="lastname" class="col-sm-2 ">权限列表</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-11 col-sm-offset-1">
            @foreach($permissions as $permission)
                    <div class="col-sm-11">
                    <input type="checkbox" id="inlineCheckbox1" name="permissionID[]" value="{{$permission->id}}" @if($permission->hasPermission)) checked=”checked” @endif>
                        {{$permission->display_name}}
                    <b>【描述： {{$permission->description}} 】</b>
                    </div>
            @endforeach
        </div>
    </div>



<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="button" id="formadd" class="btn btn-default">保存</button>
    </div>
</div>
</form>
<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>