@extends('.default')
@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div style="text-align: center;"><h1>添加活动</h1></div>
                <form action="{{ route('Article.store') }}" method="post" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <label >活动名称:</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="活动标题不能超过60个字符">
                    </div>
                    <div class="form-group">
                        <label >开始时间:</label>
                        <input class="form-control" type="date" name="start_time"  value="{{ old('signup_start') }}">
                    </div>
                    <div class="form-group">
                        <label >结束时间:</label>
                        <input class="form-control" type="date" name="end_time"  value="{{ old('signup_end') }}">
                    </div>
                    <div class="form-group">
                        <label >活动详情:</label>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>
                        <textarea style="height:400px;" id="container" name="content" type="text/plain" >{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        {{ csrf_field() }}
                        <div>
                            <a href="{{ route('Article.index') }}"  class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
                            <button type="submit"  class="btn btn-success btn-lg" style="width: 200px;float: right"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;确认添加</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
@stop