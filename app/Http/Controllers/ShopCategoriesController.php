<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Shopcategories;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShopCategoriesController extends Controller
{
    public function index()
    {

        $all = Shopcategories::all();
        return view('shopCategories/index',compact('all',[$all]));
    }

    public function create()
    {
        return view('shopCategories/create');
    }
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'name'=>'required|max:10',
            'img'=>'required',
            'status'=>'required',
        ],[
            'name.required'=>'分类名不能为空',
            'name.max'=>'分类名不能超过10个字',
            'img.required'=>'图片不能为空',
            'status.required'=>'状态不能为空',
        ]);
        //处理上传文件
        $file = $request->img;
        $filename = $file->store('public/img');
        $model = Shopcategories::create([
            'name'=>$request->name,
            'img'=>$request->img,
            'status'=>$request->status,
            'img'=>$filename,
        ]);
        //设置提示信息
        session()->flash('success','添加成功');
        return redirect()->route('shopCategories.index');
    }

    public function edit(shopCategories $shopCategory)
    {
        return view('shopCategories/edit',['edit'=>$shopCategory]);
    }
    public function update(shopCategories $shopCategory,Request $request)
    {
//Rule::unique('')->ignore($request->id)
        //数据验证
        $this->validate($request,[
            'name'=>['required','max:10',Rule::unique('shopcategories')->ignore($shopCategory->id)],
            'img'=>'required',
            'status'=>'required',
        ],[
            'name.required'=>'分类名不能为空',
            'name.max'=>'分类名不能超过10个字',
            'img.required'=>'图片不能为空',
            'status.required'=>'状态不能为空',
            'name.unique'=>'分类名不能相同'
        ]);
        //处理上传文件
        $file = $request->img;
        $filename = $file->store('public/img');
        $shopCategory->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'img'=>$filename,
        ]);
        return redirect()->route('shopCategories.index');
    }

    public function destroy(shopCategories $shopCategory)
    {
        $shopCategory->delete();
        return redirect()->route('shopCategories.index');
    }

}
