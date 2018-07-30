@extends('default')
@section('content')
    <a href="{{ route('member.create') }}" class="btn btn-primary btn-sm" role="button">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>会员名</th>
            <th>电话号码</th>
            <th>操作</th>
        </tr>
        @foreach($all as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->tel }}</td>
                <td>
                    <form action="{{ route('member.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="修改">
                            <a href="{{ route('member.edit',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">修改</span></a>
                        </button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="重置密码">
                            <a href="{{ route('member.qz',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: red">重置密码</span></a>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop