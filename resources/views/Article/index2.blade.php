<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>活动</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @include('_errors')
    @include('_messages')
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
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="查看详情">
                            <a href="http://admin.eleb.com/show/index{{$value->id}}.html"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">查看详情</span></a>
                        </button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/js/jquery-3.2.1.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
