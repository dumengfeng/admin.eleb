@extends('default')
@section('content')
    <table class="table table-condensed table-hover">
        <tr>
            <th>名称</th>
            <td>{{ $Event->title }}</td>
        </tr>
        <tr>
            <th>详情</th>
            <td>{!! $Event->content !!}</td>
        </tr>
        <tr>
            <th>报名开始时间</th>
            <td>{{ date('Y-m-d',$Event->signup_start) }}</td>
        </tr>
        <tr>
            <th>报名结束时间</th>
            <td>{{ date('Y-m-d',$Event->signup_end) }}</td>
        </tr>
        <tr>
            <th>开奖日期</th>
            <td>{{$Event->prize_date}}</td>
        </tr>
        <tr>
            <th>报名人数</th>
            <td>{{$person}}</td>
        </tr>
    </table>
    <div class="form-group" style="text-align: center;">
        <button type="button" class="btn btn-success btn-lg" style="width: 200px;float: right" title="马上开奖"><a
                    href="{{ route('Event.Lottery',['Event'=>$Event]) }}"><span style="color:#fff2f7;" class="glyphicon glyphicon-hand-right">马上开奖</span></a>
        </button>
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div>
            <a href="{{ route('Event.index') }}" class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
        </div>
    </div>
@stop