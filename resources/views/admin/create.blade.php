@extends('default')
@section('content')
    <form action="{{ route('admin.store') }}" class="form-horizontal" role="search" method="post"
          enctype="multipart/form-data">
        <div class="row"><h1>添加账号信息</h1></div>
        <div class="form-group">
            <label for="exampleInputEmail1">账号名称:</label>
            <input type="text" name="name" class=" " id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">账号邮箱:</label>
            <input type="text" name="email" class=" " id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">账号密码:</label>
            <input type="password" name="password" class=" " id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">确认密码:</label>
            <input type="password" name="repassword" class="" id="exampleInputEmail1" placeholder="">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@stop