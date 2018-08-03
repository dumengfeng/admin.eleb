@extends('default')
@section('content')
    <form action="{{ route('Rbac.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">权限名称:</label>
            <input type="text" name="name" class="" id="exampleInputEmail1" placeholder="">
        </div>
        {{ csrf_field() }}
        <input type="submit">
    </form>
@stop