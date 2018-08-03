@extends('default')
@section('content')
    <a href="{{ route('Nav.create') }}" class="btn btn-primary btn-sm" Nav="button">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>导航栏名称</th>
            <th>地址</th>
            <th>上级菜单</th>
            <th>关联权限</th>
            <th>操作</th>
        </tr>
        @foreach($Nav as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->url }}</td>
                <td>{{ $value->pid }}</td>
                <td>
{{--                    @foreach($value->permissions as $v)--}}
                        {{ $value->permission->name }}
                    {{--@endforeach--}}
                </td>
                <td>
                    <form action="{{ route('Nav.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑">
                            <a href="{{ route('Nav.edit',[$value]) }}"><span class="glyphicon glyphicon-edit"
                                                                              aria-hidden="true"
                                                                              style="color: #000">编辑</span></a>
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
    {{--{{ $Nav->links() }}--}}
@stop