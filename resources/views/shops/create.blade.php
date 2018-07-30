@extends('default')
@section('content')
    <form action="{{ route('user.store') }}" class="form-horizontal" role="search" method="post"
          enctype="multipart/form-data">
        <div class="col-xs-6 ">
            <div class="row"><h1>添加商家信息</h1></div>
            <div class="form-group">
                <label for="exampleInputEmail1">店铺名称:</label>
                <input type="text" name="shop_name" class="" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">店铺分类:</label>
                <select name="shop_category_id" id="">
                    @foreach($shopcategories as $shopcategory)
                        <option value="{{ $shopcategory->id }}">{{ $shopcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">店铺图片:</label>
                <input type="file" name="shop_img" class="" id="exampleInputPassword1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否是品牌</label>
                <label>是<input type="radio" checked name="brand" value="1"></label>
                <label>否<input type="radio" name="brand" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否准时送达</label>
                <label>是<input type="radio" checked name="on_time" value="1"></label>
                <label>否<input type="radio" name="on_time" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否蜂鸟配送</label>
                <label>是<input type="radio" checked name="fengniao" value="1"></label>
                <label>否<input type="radio" name="fengniao" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否保标记</label>
                <label>是<input type="radio" checked name="bao" value="1"></label>
                <label>否<input type="radio" name="bao" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否票标记</label>
                <label>是<input type="radio" checked name="piao" value="1"></label>
                <label>否<input type="radio" name="piao" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否准标记</label>
                <label>是<input type="radio" checked name="zhun" value="1"></label>
                <label>否<input type="radio" name="zhun" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">起送金额:</label>
                <input type="text" name="start_send" class="" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">配送费:</label>
                <input type="text" name="send_cost" class="" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">店公告:</label>
                <textarea class="" rows="3" name="notice"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">优惠信息:</label>
                <textarea class="" rows="3" name="discount"></textarea>
            </div>
        </div>
        <div class="col-xs-6 ">
            <div class="row"><h1>添加账号信息</h1></div>
            <div class="form-group">
                <label for="exampleInputEmail1">账号名称:</label>
                <input type="text" name="name" class="" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">账号邮箱:</label>
                <input type="text" name="email" class="" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">账号密码:</label>
                <input type="password" name="password" class="" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">确认密码:</label>
                <input type="password" name="repassword" class="" id="exampleInputEmail1" placeholder="">
            </div>
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">注册</button>
    </form>
@stop