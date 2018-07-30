<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth',[
        //'only'=>['info'],//该中间件只对这些方法生效
        'except'=>['index'],//该中间件除了这些方法，对其他方法生效
    ]);
    }
    public function index()
    {
        $all = Admins::all();
        return view('admin/index', compact('all', [$all]));
    }

    public function create()
    {
        $shopcategories = DB::table('shopcategories')->get();
        return view('admin/create', compact('shopcategories', $shopcategories));
    }

    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required|max:10',
            'email' => 'required',
            'password' => 'required|same:repassword',

        ], [
            'name.required' => '账号名称不能为空',
            'name.max' => '账号名称不能超过10个字',
            'email.required' => '账号邮箱不能为空',
            'password.required' => '账号密码不能为空',
            'password.same' => '账号密码与确认密码不能相同',
        ]);

        $model = Admins::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
        ]);
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('admin.index');
    }

    public function edit(admins $admin)
    {
        return view('admin/edit', ['edit' => $admin]);
    }

    public function update(admins $admin, Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request, [
            'name' => 'required', 'max:10',
            'email' => ['required',Rule::unique('admins')->ignore($admin->id)],

        ], [
            'name.required' => '账号名称不能为空',
            'name.max' => '账号名称不能超过10个字',
            'email.required' => '账号邮箱不能为空',
            'email.unique'=>'邮箱不能相同',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.index');
    }

    public function destroy(admins $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success','禁用成功');
    }
    public function qy(admins $admin)
    {
        Shops::updated([
            'status' => 1,
        ]);
        $admin->update([
            'status' => 1,
        ]);

        return redirect()->route('admin.index')->with('success','启用成功');
    }

    public function pwd(admins $admin)
    {
        return view('admin/password', ['edit' => $admin]);

    }
    public function save(admins $admin, Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|same:repassword',
            'repassword' => 'required',


        ], [
            'oldpassword.required' => '旧密码不能为空',
            'password.required' => '新密码不能为空',
            'repassword.required' => '确认密码不能为空',
            'password.same' => '确认密码与新密码不能相同',
        ]);
        $oldpassword=auth()->user()->password;
        $password = $request->oldpassword;
        if (Hash::check($password,$oldpassword)) {
            $admin->update([
                'password' => bcrypt($request->password),
            ]);
//            session()->flash('success', '旧密码正确');
            session()->flash('success', '修改成功');
            return redirect()->route('admin.index');
        }
        session()->flash('danger', '修改失败');
        return redirect()->route('admin.index');
    }
}
