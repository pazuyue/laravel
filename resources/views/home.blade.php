@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Zy管理系统</div>

                <div class="panel-body">
                    <div class="col-lg-3">
                @include('layouts.left')
                    </div>
                    <div class="col-lg-9">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <h1>欢迎登陆系统！</h1>
                            <p>这是个人git项目。</p>
                            <p><a class="btn btn-primary btn-lg" role="button">
                                    了解更多</a>
                            </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
