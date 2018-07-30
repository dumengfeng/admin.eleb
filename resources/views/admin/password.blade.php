@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('admin.save',['admin'=>$edit]) }}" method="post" enctype="multipart/form-data">
            <div class="row"><h1>账号信息</h1></div>
            <div class="form-group ">
                <label for="exampleInputEmail1">旧密码:&emsp;</label>
                <input type="password" name="oldpassword"  class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">新密码:&emsp;</label>
                <input type="password" name="password"  class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">确认密码:</label>
                <input type="password" name="repassword"  class="" id="" placeholder="">
            </div>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">修改</button>
        </form>
    </div>
@endsection
