@extends('default')
@section('content')
    <a href="{{ route('EventPrize.create') }}" class="btn btn-primary btn-sm" type="button">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>活动名称</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖商家账号</th>
            <th>操作</th>
        </tr>
        @foreach($EventPrize as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->event->title }}</td>
                <td>{{ $value->name }}</td>
                <td>{!! $value->description !!}</td>
                <td>{{ $value->shops->shop_name }}</td>
                <td>
                    <form action="{{ route('EventPrize.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑">
                            <a href="{{ route('EventPrize.edit',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">编辑</span></a>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="查看详情">
                            <a href="{{ route('EventPrize.show',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">查看详情</span></a>
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
    {{--{{ $EventPrize->links() }}--}}
@stop