@extends('default')
@section('content')
    <form class="navbar-form navbar-left" action="">
        <div class="form-group">
            <input type="month" class="form-control" placeholder="Search" name="keyword">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
        <button type="button" class="btn btn-primary"><a href="{{ route('nu.mc_day') }}" style="color: #0f0f0f">按日期搜索</a></button>
        <button type="button" class="btn btn-primary"><a href="{{ route('nu.mc') }}" style="color: #0f0f0f">总计</a></button>
    </form>

    <table class="table table-bordered table-hover">
        <tr>
            <th>菜品名称</th>
            <th>所属商家</th>
            <th>菜品价格</th>
            <th>菜品图片</th>
            <th>菜品销量</th>
            <th>总菜品销量</th>
        </tr>
        @foreach($menu as $val)
            <tr>
                <td>{{ $val->goods_name }}</td>
                <td>{{ $val->shop_name }}</td>
                <td>{{ $val->goods_price }}</td>
                <td><img src="{{ $val->goods_img }}" alt=""></td>
                <td>{{ $val->sum }}</td>
                <td>{{ $count }}</td>
            </tr>
        @endforeach
    </table>
    {{--{{ $all->appends(['keyword'=>$keyword])->links() }}--}}
@stop