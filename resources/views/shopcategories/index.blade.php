@extends('default')
@section('content')
    <a href="{{ route('shopCategories.create') }}" class="btn btn-primary btn-sm" role="button">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($all as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td><img src="{{ $value->img() }}" alt="logo"></td>
            <td>
                @if( $value->status ==1)
                    显示
                @else
                    隐藏
                @endif

            </td>
            <td><form action="{{ route('shopCategories.destroy',[$value]) }}" method="post">
                    <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑">
                        <a href="{{ route('shopCategories.edit',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">编辑</span></a>
                    </button>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-default btn-sm" aria-label="Left Align" title="删除">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true" style="color: red">删除</span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@stop