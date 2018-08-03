@extends('default')
@section('content')
        <button type="button" class="btn btn-primary"><a href="{{ route('shops.mc_day') }}" style="color: #0f0f0f">按日期搜索</a></button>
        <button type="button" class="btn btn-primary"><a href="{{ route('shops.mc_month') }}" style="color: #0f0f0f">按月份搜索</a></button>
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