<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
//        $all = Permission::paginate(2);
//        $permission = Permission::findById(3);
//        $permission ->delete();

        return view('Role/index',compact('role'));
    }

    public function create()
    {
        $permission = Permission::all();
        return view('Role/create',compact('permission'));
    }
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'name'=>'required',
            'permission'=>'required',
        ],[
            'name.required'=>'权限名称不能为空',
            'permission.required'=>'角色权限不能为空',
        ]);
        $role = Role::create(['name'=>$request->name]);
        $role->givePermissionTo($request->permission);
//        $permission = Permission::create(['name' => $request->name]);
        //设置提示信息
        session()->flash('success','添加成功');
        return redirect()->route('Role.index');
    }

    public function edit(Role $Role)
    {
        $edit = Role::findById($Role->id);

        $permission = Permission::all();
        return view('Role/edit',compact('edit','permission'));
    }
    public function update(Role $Role,Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
//        dd($Role);
        $this->validate($request,[
            'name'=>'required',
            'permission'=>'required',
        ],[
            'name.required'=>'权限名称不能为空',
            'permission.required'=>'角色权限不能为空',
        ]);

        $rel = Role::findById($Role->id);
        $rel ->syncPermissions($request->permission);
        session()->flash('success','修改成功');
        return redirect()->route('Role.index');
    }

    public function destroy(Role $Role)
    {
        $rel = Role::findById($Role->id);
//        $role -> revokePermissionTo($permission);
        $rel->delete();
        return redirect()->route('Role.index');
    }
}
