@extends('default')
@section('content')
    <h1>用户登录</h1>
    <form method="post" action="{{ route('up.login') }}">
        <div class="form-group">
            <label>用户名</label>
            <input type="text" name="name" class="form-control" placeholder="请输入用户名" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="password" name="password" class="form-control" placeholder="请输入密码">
        </div>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="rememberMe" value="1"> 记住我
            </label>
        </div>

        {{ csrf_field() }}
        <button class="btn btn-primary btn-block">登录</button>
    </form>
@stop
