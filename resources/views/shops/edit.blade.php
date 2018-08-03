@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('user.update',['user'=>$edit]) }}" method="post" enctype="multipart/form-data">
            <div class="row"><h1>账号信息</h1></div>
            <div class="form-group ">
                <label for="exampleInputEmail1">账号名称:</label>
                <input type="text" name="name" value="{{ $edit->name }}" class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">账号邮箱:</label>
                <input type="text" name="email" value="{{ $edit->email }}" class="" id="" placeholder="">
            </div>
            <div class="row"><h1>商家信息</h1></div>
            <div class="form-group">
                <label for="exampleInputEmail1">店铺名称:</label>
                <input type="text" name="shop_name" value="{{ $edit->shops->shop_name }}" class="" id="" placeholder="">
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
                <input type="file" name="shop_img" class="" id="" placeholder="">
                <img src="{{ $edit->shops->shop_img }}" alt="">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否是品牌</label>
                <label>是<input type="radio" {{ ($edit->shops->brand==1)?'checked':'' }}
                    name="brand" value="1"></label>
                <label>否<input type="radio" {{ ($edit->shops->brand==0)?'checked':'' }} name="brand" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否准时送达</label>
                <label>是<input type="radio" {{ ($edit->shops->on_time==1)?'checked':'' }} name="on_time" value="1"></label>
                <label>否<input type="radio" {{ ($edit->shops->on_time==0)?'checked':'' }} name="on_time" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否蜂鸟配送</label>
                <label>是<input type="radio" {{ ($edit->shops->fengniao==1)?'checked':'' }} name="fengniao" value="1"></label>
                <label>否<input type="radio" {{ ($edit->shops->fengniao==0)?'checked':'' }} name="fengniao" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否保标记</label>
                <label>是<input type="radio" {{ ($edit->shops->bao==1)?'checked':'' }} name="bao" value="1"></label>
                <label>否<input type="radio" {{ ($edit->shops->bao==0)?'checked':'' }} name="bao" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否票标记</label>
                <label>是<input type="radio" {{ ($edit->shops->piao==1)?'checked':'' }} name="piao" value="1"></label>
                <label>否<input type="radio" {{ ($edit->shops->piao==0)?'checked':'' }} name="piao" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">是否准标记</label>
                <label>是<input type="radio" {{ ($edit->shops->zhun==1)?'checked':'' }} name="zhun" value="1"></label>
                <label>否<input type="radio" {{ ($edit->shops->zhun==0)?'checked':'' }} name="zhun" value="0"></label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">起送金额:</label>
                <input type="text" name="start_send" value="{{ $edit->shops->start_send }}" class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">配送费:</label>
                <input type="text" name="send_cost" value="{{ $edit->shops->send_cost }}" class="" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">店公告:</label>
                <textarea class=""  rows="3" name="notice">{{ $edit->shops->notice }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">优惠信息:</label>
                <textarea class="" rows="3" name="discount">{{ $edit->shops->discount }}</textarea>
            </div>

            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">修改</button>
        </form>
    </div>
@endsection
