@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('Nav.update',['shop'=>$Nav]) }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">名称:</label>
                <input type="text" name="name" value="@if(old('name')){{ old('name') }}@else{{ $Nav->name }}@endif"
                       class="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">地址:</label>
                <input type="text" name="url" value="{{ $Nav->url }}" class="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">上单:</label>
                <select name="pid" id="">
                    <option value="0">顶级菜单</option>
                    @foreach($all as $v)
                        <option @if($Nav->pid==$v->id) selected @endif value="{{ $v->pid }}">{{ $v->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">菜单权限:</label>
                <select name="permission_id" id="">
                    @foreach($permission as $val)
                        <option @if($Nav->permission_id==$val->id)
                                selected
                                @endif
                                value="{{ $val->id }}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit">提交</button>
        </form>
    </div>
@endsection
