@extends('default')
@section('content')
    <form action="{{ route('shopCategories.store') }}" method="post" enctype="multipart/form-data">
        分类名称:<input type="text" name="name"><br>
        分类图片:<input type="file" name="img">
        是否显示: <label>显示<input type="radio" checked name="status" value="1"></label>
        <label>隐藏:<input type="radio" name="status" value="0"></label><br>
        {{ csrf_field() }}
        <input type="submit">
    </form>
@stop