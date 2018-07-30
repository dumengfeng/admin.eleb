<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MembersController extends Controller
{
    public function index()
    {
        $all = Member::all();;
        return view('member/index', compact('all', [$all]));
    }

    public function create()
    {
//        $shopcategories = DB::table('shopcategories')->get();
        return view('member/create');
    }

    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'username' => 'required|max:10',
            'tel' => 'required',
            'password' => 'required|same:repassword',
        ], [
            'username.required' => '会员名称不能为空',
            'username.max' => '会员名称不能超过10个字',
            'tel.required' => '电话号码不能为空',
            'password.required' => '会员密码不能为空',
            'password.same' => '会员密码与确认密码不能相同',
        ]);
        $model = Member::create([
            'username' => $request->username,
            'tel' => $request->tel,
            'password' => bcrypt($request->password),
        ]);
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('member.index');
    }

    public function edit(member $member)
    {
//        $shopcategories = DB::table('shopcategories')->get();
        return view('member/edit', ['edit' => $member]);
    }

    public function update(member $member, Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request, [
            'username' => 'required|max:10',
            'tel' => ['required',Rule::unique('members')->ignore($member->id)],
        ], [
            'username.required' => '会员名称不能为空',
            'username.max' => '会员名称不能超过10个字',
            'tel.required' => '电话号码不能为空',
        ]);
        $member->update([
            'username' => $request->username,
            'tel' => $request->tel,
        ]);
        return redirect()->route('member.index');
    }

    public function destroy(member $member)
    {
        Shops::updated([
            'status' => -1,
        ]);
        $member->update([
            'status' => 0,
        ]);

        return redirect()->route('member.index')->with('success','禁用成功');
    }
    public function qz(member $member)
    {
        Shops::updated([
            'status' => 1,
        ]);
        $member->update([
            'status' => 1,
        ]);

        return redirect()->route('member.index')->with('success','启用成功');
    }
    //重置密码
    public function pwd(member $member)
    {
        return view('member/password', ['edit' => $member]);

    }
    public function save(member $member, Request $request)
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
        $member->update([
            'password' => $password,
        ]);
        session()->flash('success', '修改成功');
        return redirect()->route('member.index');
    }
}
