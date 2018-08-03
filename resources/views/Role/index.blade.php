@extends('default')
@section('content')
    <a href="{{ route('Role.create') }}" class="btn btn-primary btn-sm" role="button">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>角色名称</th>
            <th>拥有权限</th>
            <th>操作</th>
        </tr>
        @foreach($role as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    @foreach($value->permissions as $v)
                        {{ $v->name }}
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('Role.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑">
                            <a href="{{ route('Role.edit',[$value]) }}"><span class="glyphicon glyphicon-edit"
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
    {{--{{ $role->links() }}--}}
@stop