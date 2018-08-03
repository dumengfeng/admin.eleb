<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $Event = Event::all();
        return view('Event/index', compact('Event'));
    }

    public function create()
    {
        $Event = Event::all();
//        $permission = Permission::all();
        return view('Event/create', compact('Event'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'signup_start' => 'required',
            'signup_end' => 'required',
            'prize_date' => 'required',
            'signup_num' => 'required',
//            'is_prize' => 'required',
        ], [
            'title.required' => '名称不能为空',
            'content.required' => '详情不能为空',
            'signup_start.required' => '报名开始时间不能为空',
            'signup_end.required' => '报名结束时间不能为空',
            'prize_date.required' => '开奖日期不能为空',
            'signup_num.required' => '报名人数限制不能为空',
//            'is_prize.required' => '是否已开奖不能为空',
        ]);
//        dd($request->signup_start);
        $Event = Event::create(array(
            'title' => $request->title,
            'content' => $request->content,
            'signup_start' => strtotime($request->signup_start),
            'signup_end' => strtotime($request->signup_end),
            'prize_date' => $request->prize_date,
            'signup_num' => $request->signup_num,
            'is_prize' =>0,
        ));
        //设置提示信息
        session()->flash('success', '添加成功');
        return redirect()->route('Event.index');
    }

    public function edit(Event $Event)
    {
        $all = Event::all();
        return view('Event/edit', compact('Event', 'all'));
    }

    public function update(Event $Event, Request $request)
    {
        //数据验证
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'signup_start' => 'required',
            'signup_end' => 'required',
            'prize_date' => 'required',
            'signup_num' => 'required',
//            'is_prize' => 'required',
        ], [
            'title.required' => '名称不能为空',
            'content.required' => '详情不能为空',
            'signup_start.required' => '报名开始时间不能为空',
            'signup_end.required' => '报名结束时间不能为空',
            'prize_date.required' => '开奖日期不能为空',
            'signup_num.required' => '报名人数限制不能为空',
//            'is_prize.required' => '是否已开奖不能为空',
        ]);
        $Event->update([
            'title' => $request->title,
            'content' => $request->content,
            'signup_start' => strtotime($request->signup_start),
            'signup_end' => strtotime($request->signup_end),
            'prize_date' => $request->prize_date,
            'signup_num' => $request->signup_num,
            'is_prize' =>0,
        ]);
        //设置提示信息
        session()->flash('success', '修改成功');
        return redirect()->route('Event.index');
    }

    public function show(Event $Event)
    {
        return view('Event/show',compact('Event'));
    }

    public function destroy(Event $Event)
    {
        $Event->delete();
        return redirect()->route('Event.index');
    }
}
