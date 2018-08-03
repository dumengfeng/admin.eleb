@extends('default')
@section('content')
    <a href="{{ route('Event.create') }}" class="btn btn-primary btn-sm" type="button">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>名称</th>
            <th>详情</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖日期</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
            <th>操作</th>
        </tr>
        @foreach($Event as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{!! $value->content !!}</td>
                <td>{{ date('Y-m-d',$value->signup_start) }}</td>
                <td>{{ date('Y-m-d',$value->signup_end) }}</td>
                <td>{{ $value->prize_date }}</td>
                <td>{{ $value->signup_num }}</td>
                <td>
                    @if($value->is_prize ==1)
                        已开奖
                    @else
                        未开奖
                    @endif
                </td>
                <td>
                    <form action="{{ route('Event.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑">
                            <a href="{{ route('Event.edit',[$value]) }}"><span class="glyphicon glyphicon-edit"
                                                                               aria-hidden="true"
                                                                               style="color: #000">编辑</span></a>
                        </button>

                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="查看详情">
                            <a href="{{ route('Event.show',[$value]) }}"><span class="glyphicon glyphicon-edit"
                                                                               aria-hidden="true"
                                                                               style="color: #000">查看详情</span></a>
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
    {{--{{ $Event->links() }}--}}
@stop