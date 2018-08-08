@extends('default')
@section('content')
    <table class="table table-condensed table-hover">
        <tr>
            <th>活动名称</th>
            <td>{{ $EventMember->article->title }}</td>
        </tr>
        <tr>
            <th>商家账号</th>
            <td>{{ $EventMember->shops->shop_name }}</td>
        </tr>
    </table>
    <div class="form-group" style="text-align: center;">
        <button type="button" class="btn btn-success btn-lg" style="width: 200px;float: right" title="马上开奖"><a
                    href="{{ route('EventMember.edit',['EventMember'=>$EventMember]) }}"><span style="color:#fff2f7;" class="glyphicon glyphicon-hand-right">添加奖品</span></a>
        </button>
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div>
            <a href="{{ route('EventMember.index') }}" class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
        </div>
    </div>
@stop