@extends('default')
@section('content')
    <div class="btn-group-vertical" role="group" aria-label="...">
        <a href="{{ route('Article.index',['keyword'=>1]) }}" name="keyword" class="btn btn-primary btn-sm action" type="button">未开始</a>
        <a href="{{ route('Article.index',['keyword'=>2]) }}" name="keyword" class="btn  btn-sm" type="button">进行中</a>
        <a href="{{ route('Article.index',['keyword'=>3]) }}" name="keyword" class="btn  btn-sm" type="button">已结束</a>
    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($Article as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{!! $value->content !!}</td>
                <td>{{ $value->start_time }}</td>
                <td>{{ $value->end_time }}</td>
                <td>
                    <form action="{{ route('Article.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑">
                            <a href="{{ route('Article.edit',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">编辑</span></a>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="查看详情">
                            <a href="{{ route('Article.show',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">查看详情</span></a>
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
    <a href="{{ route('Article.create') }}" class="btn btn-primary btn-lg" type="button">添加</a>
    {{--{{ $Article->links() }}--}}
@stop