@extends('default')
@section('content')
    <table class="table table-condensed table-hover">
        <tr>
            <th>活动名称</th>
            <td>{{ $Event->title }}</td>
        </tr>
        <tr>
            <th>商家账号</th>
            <td>{!! $Event->content !!}</td>
        </tr>
        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑"><a href="{{ route('Event.edit',[$Event]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">sss</span></a>
        </button>
    @else
        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="编辑"><a href="{{ route('Event.edit',[$Event]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">马上开奖</span></a>
        </button>
    @endif
@stop