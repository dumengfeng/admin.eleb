<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $all = User::all();;
        return view('user/index', compact('all', [$all]));
    }

    public function create()
    {
        $shopcategories = DB::table('shopcategories')->get();
        return view('user/create', compact('shopcategories', $shopcategories));
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
        //处理上传文件
        $file = $request->shop_img;
        $filename = Storage::url($file->store('public/img'));
        $re = Shops::create([
            'shop_name' => $request->shop_name,
            'shop_category_id' => $request->shop_category_id,
            'shop_img' => url($filename),
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
            'shop_rating' => 10,
            'status' => 1,
        ]);

        $model = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'shop_id' => $re->id,
        ]);
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('user.index');
    }

    public function edit(user $user)
    {
        $shopcategories = DB::table('shopcategories')->get();
        return view('user/edit', ['edit' => $user, 'shopcategories' => $shopcategories]);
    }

    public function update(user $user, Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required|max:10',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'shop_name' => 'required',
            'start_send' => 'required',
            'send_cost' => 'required',
            'notice' => 'required',
            'discount' => 'required',
        ], [
            'name.required' => '账号名称不能为空',
            'name.max' => '账号名称不能超过10个字',
            'email.required' => '邮箱不能为空',
            'email.unique' => '邮箱不能相同',
            'start_send.required' => '起送金额不能为空',
            'send_cost.required' => '配送费不能为空',
            'notice.required' => '店公告不能为空',
            'discount.required' => '优惠信息不能为空',
        ]);
        $re1 = DB::table('shops')->update([
            'shop_name' => $request->shop_name,
            'shop_category_id' => $request->shop_category_id,
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
            'shop_rating' => rand(1,10),
            'status' => 1,
        ]);
//        $re1 = $shop->update();
        $re2 = $user->update(['name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'shop_id' => $user->id,]);
        $this->send();
        session()->flash('success', '审核成功');
        return redirect()->route('user.index');
    }

    public function send()
    {
        $rel =Mail::send('welcome',[],function ($message){
            $message->from('2515354006@qq.com','dmf18990915963');
            $message->to(['2515354006@qq.com'])->subject('你的审核已通过,欢迎入驻eleb');
        });
    }
    public function destroy(user $user)
    {
        Shops::updated([
            'status' => -1,
        ]);
        $user->update([
            'status' => 0,
        ]);

        return redirect()->route('user.index')->with('success','禁用成功');
    }
    public function qy(user $user)
    {
        Shops::updated([
            'status' => 1,
        ]);
        $user->update([
            'status' => 1,
        ]);

        return redirect()->route('user.index')->with('success','启用成功');
    }
    //重置密码
    public function pwd(user $user)
    {
        return view('user/password', ['edit' => $user]);

    }
    public function save(user $user, Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request, [
            'password' => 'required|same:repassword',
            'repassword' => 'required',
        ], [
            'password.required' => '新密码不能为空',
            'repassword.required' => '确认密码不能为空',
            'password.same' => '确认密码与新密码不能相同',
        ]);
        $password =  bcrypt($request->password);
        $user->update([
            'password' => $password,
        ]);
            session()->flash('success', '修改成功');
            return redirect()->route('user.index');
    }
}
