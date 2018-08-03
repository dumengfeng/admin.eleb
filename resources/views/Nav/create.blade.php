@extends('default')
@section('content')
    <form action="{{ route('Nav.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">名称:</label>
            <input type="text" name="name" class="" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">地址:</label>
            <input type="text" name="url" class="" id="exampleInputEmail1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">上单:</label>
            <select name="pid" id="">
                <option value="0">顶级菜单</option>
                @foreach($Nav as $v)
                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">菜单权限:</label>
            <select name="permission_id" id="">
                @foreach($permission as $val)
                    <option value="{{ $val->id }}">{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        {{ csrf_field() }}
        <input type="submit">
    </form>
@stop