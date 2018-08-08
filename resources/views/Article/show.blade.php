@extends('default')
@section('content')
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
            <a href="{{ route('Article.index') }}" class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
        </div>
    </div>
@stop