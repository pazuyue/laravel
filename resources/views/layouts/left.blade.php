<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            权限管理
        </h3>
    </div>
    <div>
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne">
                            用户管理
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#" class="clickleft" url="/user/usermain">用户列表</a></li>
                            <li><a href="#" class="clickleft" url="/user/useraddshow">用户添加</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo">
                            角色管理
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#" class="clickleft" url="/role/rolelist"> 角色列表</a></li>
                            <li><a href="#" class="clickleft" url="/role/roleaddshow">角色添加</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" class=""
                           href="#collapseThr">
                            权限管理
                        </a>
                    </h4>
                </div>
                <div id="collapseThr" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#" class="clickleft" url="/permission/permissionlist"> 权限列表</a></li>
                            <li><a href="#" class="clickleft" url="/permission/permissionadd">权限添加</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script typet="text/javascript" src="{{ asset('js/leftmenu.js') }}"></script>