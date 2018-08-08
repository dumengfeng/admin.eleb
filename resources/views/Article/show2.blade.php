<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @include('_errors')
    @include('_messages')
    <table class="table table-condensed table-hover">
        <tr>
            <th>名称</th>
            <td>{{ $Article->title }}</td>
        </tr>
        <tr>
            <th>详情</th>
            <td>{!! $Article->content !!}</td>
        </tr>
        <tr>
            <th>报名开始时间</th>
            <td>{{ $Article->start_time }}</td>
        </tr>
        <tr>
            <th>报名结束时间</th>
            <td>{{ $Article->end_time }}</td>
        </tr>
    </table>
    <div class="form-group" style="text-align: center;">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div>
            <a href="http://admin.eleb.com/art/index.html" class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
        </div>
    </div>
</div>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/js/jquery-3.2.1.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>