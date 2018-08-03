@extends('default')
@section('content')
    <form action="{{ route('Role.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">角色名称:</label>
            <input type="text" name="name" class="" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">角色权限:</label>
            @foreach($permission as $val)
            <label class="checkbox-inline">
                <input type="checkbox" name="permission[]" value="{{ $val->id }}"> {{$val->name}}
            </label>
            @endforeach
        </div>
        {{ csrf_field() }}
        <input type="submit">
    </form>
@stop