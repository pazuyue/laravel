<div id="message"></div>
<form class="form-horizontal" role="form" id="form" action="{{url("/user/useredit")}}" method="POST">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{ $user -> id  }}">
            <input type="text" class="form-control" id="name" name="name" placeholder="请输入姓名" value="{{ $user -> name  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">EMAIL</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" placeholder="请输入email地址" value="{{ $user -> email  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码" value="{{ $user -> password  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="请确认密码" value="{{ $user -> password  }}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="formadd" class="btn btn-default">保存</button>
        </div>
    </div>
</form>
<script typet="text/javascript" src="{{ asset('js/useradmin.js') }}"></script>