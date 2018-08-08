@extends('.default')
@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div style="text-align: center;"><h1>添加抽奖奖品</h1></div>
                <form action="{{ route('EventPrize.store') }}" method="post" enctype="multipart/form-data" class="form">
                    <input type="hidden" name="events_id" value="{{ $events_id }}">
                    <div class="form-group">
                        <label >奖品名称:</label>
                        <input class="form-control" type="text" name="name" value="{{ old('title') }}" placeholder="奖品名称不能超过60个字符">
                    </div>
                    <div class="form-group">
                        <label >奖品详情:</label>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>
                        <textarea style="height:400px;" id="container" name="description" type="text/plain" >{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        {{ csrf_field() }}
                        <div>
                            <a href="{{ route('EventPrize.index') }}"  class="btn btn-info btn-lg" style="width: 200px;float: left">返回&nbsp;<span class="glyphicon glyphicon-hand-left"></span></a>
                            <button type="submit"  class="btn btn-success btn-lg" style="width: 200px;float: right"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;确认添加</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
@stop