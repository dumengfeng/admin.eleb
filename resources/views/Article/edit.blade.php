@extends('.default')
@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div style="text-align: center;"><h1>修改活动</h1></div>
                <form action="{{ route('Article.update',['Article'=>$Article]) }}" method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <label >活动名称:</label>
                        <input class="form-control" type="text" name="title" value="@if(old('title')){{ old('title') }}@else{{ $Article->title }}@endif" placeholder="活动标题不能超过60个字符">
                    </div>
                    <div class="form-group">
                        <label >开始时间:</label>
                        <input class="form-control" type="date" name="start_time"  value="@if(old('start_time')){{ old('start_time') }}@else{{ $Article->start_time }}@endif">
                    </div>
                    <div class="form-group">
                        <label >结束时间:</label>
                        <input class="form-control" type="date" name="end_time"  value="@if(old('end_time')){{ old('end_time') }}@else{{ $Article->end_time }}@endif">
                    </div>
                    <div class="form-group">
                        <label >活动详情:</label>

                        <script id="container" name="content" type="text/plain">{!! $Article->content !!}</script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div>
                            <a href="{{ route('Article.index') }}"  class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
                            <button type="submit"  class="btn btn-success btn-lg" style="width: 200px;float: right"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
@stop