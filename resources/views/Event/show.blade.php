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
    </table>
    @if($Event->is_prize==1)
        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑"><a href="{{ route('Event.edit',[$Event]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">sss</span></a>
        </button>
    @else
        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑"><a href="{{ route('Event.edit',[$Event]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">马上开奖</span></a>
        </button>
    @endif
@stop