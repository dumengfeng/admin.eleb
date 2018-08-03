<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class NavController extends Controller
{
    public function index()
    {
        $Nav = Nav::all();
        return view('Nav/index', compact('Nav'));
    }

    public function create()
    {
        $Nav = Nav::all();
        $permission = Permission::all();
        return view('Nav/create', compact('permission', 'Nav'));
    }

    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'pid' => 'required',
            'permission_id' => 'required',
        ], [
            'name.required' => '菜单名称不能为空',
            'url.required' => '菜单地址不能为空',
            'pid.required' => '菜单上级菜单不能为空',
            'permission_id.required' => '菜单权限不能为空',
        ]);
        $Nav = Nav::create([
            'name' => $request->name,
            'url' => $request->url,
            'pid' => $request->pid,
            'permission_id' => $request->permission_id,
        ]);
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('Nav.index');
    }

    public function edit(Nav $Nav)
    {
        $all = Nav::all();
        $permission = Permission::all();
        return view('Nav/edit', compact('Nav', 'permission', 'all'));
    }

    public function update(Nav $Nav, Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'pid' => 'required',
            'permission_id' => 'required',
        ], [
            'name.required' => '菜单名称不能为空',
            'url.required' => '菜单地址不能为空',
            'pid.required' => '菜单上级菜单不能为空',
            'permission_id.required' => '菜单权限不能为空',
        ]);
        $Nav->update([
            'name' => $request->name,
            'url' => $request->url,
            'pid' => $request->pid,
            'permission_id' => $request->permission_id,
            ]);
        //设置提示信息
        session()->flash('success', '修改成功');
        return redirect()->route('Nav.index');
    }

    public function destroy(Nav $Nav)
    {
        $Nav->delete();
        return redirect()->route('Nav.index');
    }
}
