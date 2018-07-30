<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function index()
    {

        $all = User::all();
        return view('shops/index', compact('all', [$all]));
    }

    public function create()
    {
        $shopcategories = DB::table('shopcategories')->get();
        return view('shops/create', compact('shopcategories', $shopcategories));
    }

    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required|max:10',
            'email' => 'required',
            'password' => 'required|same:repassword',
            'shop_name' => 'required',
            'shop_img' => 'required',
            'start_send' => 'required',
            'send_cost' => 'required',
            'notice' => 'required',
            'discount' => 'required',
        ], [
            'name.required' => '账号名称不能为空',
            'name.max' => '账号名称不能超过10个字',
            'email.required' => '账号邮箱不能为空',
            'password.required' => '账号密码不能为空',
            'password.same' => '账号密码与确认密码不能相同',
            'shop_name.required' => '店铺名称不能为空',
            'shop_img.required' => '店铺图片不能为空',
            'start_send.required' => '起送金额不能为空',
            'send_cost.required' => '配送费不能为空',
            'notice.required' => '店公告不能为空',
            'discount.required' => '优惠信息不能为空',
        ]);
        $status = 0;
        //处理上传文件
        $file = $request->shop_img;
        $filename = $file->store('public/img');
        $model = shops::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 0,
        ]);
        Shops::create([
            'shop_name' => $request->shop_name,
            'shop_category_id' => $request->shop_category_id,
            'shop_img' => $filename,
            'brand' => $request->brand,
            'on_time' => $request->on_time,
            'fengniao' => $request->fengniao,
            'bao' => $request->bao,
            'piao' => $request->piao,
            'zhun' => $request->zhun,
            'start_send' => $request->start_send,
            'send_cost' => $request->send_cost,
            'notice' => $request->notice,
            'discount' => $request->discount,
            'shop_rating'=>10,
            'status' => 0,
        ]);
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('shops.index');
    }

    public function edit(shops $shopCategory)
    {
        return view('shops/edit', ['edit' => $shopCategory]);
    }

    public function update(shops $shops, Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request, [
            'name' => ['required', 'max:10', Rule::unique('shops')->ignore($shops->id)],
            'email' => 'required',
            'password' => 'required',
            'shop_name' => 'required',
            'shop_img' => 'required',
            'start_send' => 'required',
            'send_cost' => 'required',
            'notice' => 'required',
            'discount' => 'required',
        ], [
            'name.required' => '分类名不能为空',
            'name.max' => '分类名不能超过10个字',
            'img.required' => '图片不能为空',
            'status.required' => '状态不能为空',
            'name.unique' => '分类名不能相同'
        ]);
        //处理上传文件
        $file = $request->img;
        $filename = $file->store('public/img');
        $shops->update([
            'name' => $request->name,
            'status' => $request->status,
            'img' => $filename,
        ]);
        return redirect()->route('shops.index');
    }

    public function destroy(shops $shopCategory)
    {
        $shopCategory->delete();
        return redirect()->route('shops.index');
    }
}
