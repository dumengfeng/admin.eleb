@extends('default')
@section('content')
    <form action="{{ route('member.store') }}" class="form-horizontal" role="search" method="post"
          enctype="multipart/form-data">
        <div class="row"><h1>添加会员信息</h1></div>
        <div class="form-group ">
            <label for="exampleInputEmail1">会员名称:</label>
            <input type="text" name="username" class="" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">电话号码:</label>
            <input type="text" name="tel" class="" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">会员密码:</label>
            <input type="password" name="password" class="" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">确认密码:</label>
            <input type="password" name="repassword" class="" id="exampleInputEmail1" placeholder="">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@stop