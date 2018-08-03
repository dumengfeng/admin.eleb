@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('admin.update',['shop'=>$admin]) }}" method="post" enctype="multipart/form-data">
            <div class="row"><h1>账号信息</h1></div>
            <div class="form-group ">
                <label for="exampleInputEmail1">账号名称:</label>
                <input type="text" name="name" value="{{ $admin->name }}" class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">账号邮箱:</label>
                <input type="text" name="email" value="{{ $admin->email }}" class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">角色权限:</label>
                @foreach($Role as $val)
                    <label class="checkbox-inline">
                        <input type="checkbox"
                               @if($admin->hasRole($val->name))
                               checked
                               @endif
                               name="Role[]" value="{{ $val->id }}"> {{$val->name}}
                    </label>
                @endforeach
            </div>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">修改</button>
        </form>
    </div>
@endsection
