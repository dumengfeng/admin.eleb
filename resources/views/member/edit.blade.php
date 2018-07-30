@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('member.update',['shop'=>$edit]) }}" method="post" enctype="multipart/form-data">
            <div class="row"><h1>会员信息</h1></div>
            <div class="form-group ">
                <label for="exampleInputEmail1">会员名称:</label>
                <input type="text" name="username" value="{{ $edit->username }}" class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">电话号码:</label>
                <input type="text" name="tel" value="{{ $edit->tel }}" class="" id="" placeholder="">
            </div>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">修改</button>
        </form>
    </div>
@endsection
