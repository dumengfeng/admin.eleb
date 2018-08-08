<?php

namespace App\Http\Controllers;

use App\Models\EventPrize;
use Illuminate\Http\Request;

class EventPrizeController extends Controller
{
    public function index()
    {
        $EventPrize = EventPrize::all();
        return view('EventPrize/index', compact('EventPrize'));
    }

    public function create(Request $request)
    {
//        dd($request->id);
        $events_id = $request->id;
        return view('EventPrize/create',compact('events_id'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'events_id' => 'required',
        ], [
            'name.required' => '奖品名称不能为空',
            'description.required' => '奖品详情不能为空',
            'events_id.required' => '活动id不能为空',
        ]);
        $EventPrize = EventPrize::create(array(
            'name' => $request->name,
            'description' => $request->description,
            'events_id' => $request->events_id,
            'member_id' =>0,
        ));
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('EventPrize.index');
    }

    public function edit(EventPrize $EventPrize)
    {
        $all = EventPrize::all();
        return view('EventPrize/edit', compact('EventPrize', 'all'));
    }

    public function update(EventPrize $EventPrize, Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'events_id' => 'required',
        ], [
            'name.required' => '奖品名称不能为空',
            'description.required' => '奖品详情不能为空',
            'events_id.required' => '活动id不能为空',
        ]);
        $EventPrize->update([
            'name' => $request->name,
            'description' => $request->description,
            'events_id' => $request->events_id,
            'member_id' =>0,
        ]);
        //设置提示信息
        session()->flash('success', '修改成功');
        return redirect()->route('EventPrize.index');
    }

    public function show(EventPrize $EventPrize)
    {
        $person = count(EventPrizeMember::select()->where('EventPrizes_id',$EventPrize->id)->get());
        return view('EventPrize/show',compact('EventPrize','person'));
    }

    public function destroy(EventPrize $EventPrize)
    {
        $EventPrize->delete();
        return redirect()->route('EventPrize.index');
    }
}
