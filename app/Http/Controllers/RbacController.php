<?php

namespace App\Http\Controllers;

use App\Models\Rbac;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RbacController extends Controller
{
    public function index()
    {

        $all = Permission::paginate(2);
        return view('Rbac/index',compact('all'));
    }

    public function create()
    {
        return view('Rbac/create');
    }
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'name'=>'required',
        ],[
            'name.required'=>'权限名称不能为空',
        ]);
        $permission = Permission::create(['name' => $request->name]);
        //设置提示信息
        session()->flash('success','添加成功');
        return redirect()->route('Rbac.index');
    }

    public function edit(Rbac $Rbac)
    {
        $permission = Permission::findById($Rbac->id);
        return view('Rbac/edit',['edit'=>$permission]);
    }
    public function update(Rbac $Rbac,Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request,[
            'name'=>'required',
        ],[
            'name.required'=>'权限名不能为空',
        ]);

        $permission = Permission::findById($Rbac->id);
        $permission->update(['name'=>$request->name],['id'=>$Rbac->id]);
        session()->flash('success','修改成功');
        return redirect()->route('Rbac.index');
    }

    public function destroy(Rbac $Rbac)
    {
        $permission = Permission::findById($Rbac->id);
        $permission->delete();
        return redirect()->route('Rbac.index');
    }
}
