<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['info'],//该中间件只对这些方法生效
            //'except'=>[],//该中间件除了这些方法，对其他方法生效
        ]);
    }
    //登录
    public function login()
    {
        if (Auth::check()) {
            // 用户已登录...
            return redirect('/');
        }
        return view('session/login');
    }
    public function create(){
        return view('session/login');
    }
    public function store(Request $request)
    {
//        dd($request->rememberMe);
        $this->validate($request,
            [
                'name'=>'required',
                'password'=>'required',
                'captcha' => 'required|captcha',
            ],
            [
                'name.required'=>'用户名不能为空',
                'password.required'=>'密码不能为空',
                'captcha.required'=>'验证码不能为空',
                'captcha.captcha'=>'验证码不正确',
            ]
        );
        if(Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ],$request->rememberMe)){//认证通过
            return redirect('/admin')->with('success','登录成功');
        }else{
            return back()->with('danger','用户名或密码错误')->withInput();
        }

    }

    //注销
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('Sessions.login')->with('success','注销成功');
    }

//    //获取当前登录用户的信息
//    public function info()
//    {
//        /*if (!Auth::check()) {
//            // 用户未登录...
//            return redirect('login');
//        }*/
//        return Auth::user()->email;
//    }

}
