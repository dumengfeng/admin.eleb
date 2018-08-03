@extends('default')
@section('content')
    <form class="navbar-form navbar-left" action="">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" name="keyword">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
        <a href="{{ route('member.create') }}" class="btn btn-primary btn-sm" role="button">添加</a>
    </form>

    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>会员名</th>
            <th>电话号码</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($all as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->tel }}</td>
                <td>
                    @if( $value->status ==1)
                        启用
                    @else
                        禁用
                    @endif
                </td>
                <td>
                    <form action="{{ route('member.destroy',[$value]) }}" method="post">
                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="修改">
                            <a href="{{ route('member.edit',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: #000">修改</span></a>
                        </button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @if($value->status==0)
                            <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="启用">
                                <a href="{{ route('member.qy',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: red">启用</span></a>
                            </button>
                        @else
                            <button type="submit" class="btn btn-default btn-sm" aria-label="Left Align" title="禁用">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="color: red">禁用</span>
                            </button>
                        @endif

                        <button type="button" class="btn btn-default btn-sm" aria-label="Left Align" title="重置密码">
                            <a href="{{ route('member.qz',[$value]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color: red">重置密码</span></a>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $all->appends(['keyword'=>$keyword])->links() }}
@stop