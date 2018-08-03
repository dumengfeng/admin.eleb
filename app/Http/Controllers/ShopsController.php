<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shops;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
//    public function index()
//    {
//
//        $all = User::all();
//        return view('shops/index', compact('all', [$all]));
//    }
//
//    public function create()
//    {
//        $shopcategories = DB::table('shopcategories')->get();
//        return view('shops/create', compact('shopcategories', $shopcategories));
//    }
//
//    public function store(Request $request)
//    {
//        //数据验证
//        $this->validate($request, [
//            'name' => 'required|max:10',
//            'email' => 'required',
//            'password' => 'required|same:repassword',
//            'shop_name' => 'required',
//            'shop_img' => 'required',
//            'start_send' => 'required',
//            'send_cost' => 'required',
//            'notice' => 'required',
//            'discount' => 'required',
//        ], [
//            'name.required' => '账号名称不能为空',
//            'name.max' => '账号名称不能超过10个字',
//            'email.required' => '账号邮箱不能为空',
//            'password.required' => '账号密码不能为空',
//            'password.same' => '账号密码与确认密码不能相同',
//            'shop_name.required' => '店铺名称不能为空',
//            'shop_img.required' => '店铺图片不能为空',
//            'start_send.required' => '起送金额不能为空',
//            'send_cost.required' => '配送费不能为空',
//            'notice.required' => '店公告不能为空',
//            'discount.required' => '优惠信息不能为空',
//        ]);
//        //处理上传文件
//        $file = $request->shop_img;
//        $filename = $file->store('public/img');
//        $model = shops::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password),
//            'status' => 1,
//        ]);
//        Shops::create([
//            'shop_name' => $request->shop_name,
//            'shop_category_id' => $request->shop_category_id,
//            'shop_img' => $filename,
//            'brand' => $request->brand,
//            'on_time' => $request->on_time,
//            'fengniao' => $request->fengniao,
//            'bao' => $request->bao,
//            'piao' => $request->piao,
//            'zhun' => $request->zhun,
//            'start_send' => $request->start_send,
//            'send_cost' => $request->send_cost,
//            'notice' => $request->notice,
//            'discount' => $request->discount,
//            'shop_rating' => rand(1,10),
//            'status' => 1,
//        ]);
//        //设置提示信息
//        session()->flash('success', '添加成功');
//        return redirect()->route('shops.index');
//    }
//
//    public function edit(shops $shopCategory)
//    {
//        return view('shops/edit', ['edit' => $shopCategory]);
//    }
//
//    public function update(shops $shops, Request $request)
//    {
////        dd($shops);
////Rule::unique('')->ignore($request->id)
//        //数据验证
//        $this->validate($request, [
//            'name' => ['required', 'max:10', Rule::unique('shops')->ignore($shops->id)],
//            'email' => 'required',
//            'password' => 'required',
//            'shop_name' => 'required',
//            'shop_img' => 'required',
//            'start_send' => 'required',
//            'send_cost' => 'required',
//            'notice' => 'required',
//            'discount' => 'required',
//        ], [
//            'name.required' => '分类名不能为空',
//            'name.max' => '分类名不能超过10个字',
//            'img.required' => '图片不能为空',
//            'status.required' => '状态不能为空',
//            'name.unique' => '分类名不能相同'
//        ]);
//        //处理上传文件
//        $file = $request->img;
//        $filename = $file->store('public/img');
//        $shops->update([
//            'name' => $request->name,
//            'status' => $request->status,
//            'img' => $filename,
//        ]);
//        return redirect()->route('shops.index');
//    }
//
//    public function destroy(shops $shopCategory)
//    {
//        $shopCategory->delete();
//        return redirect()->route('shops.index');
//    }

    //菜品统计
    public function count(Request $request)
    {
        $menu = DB::select("select s.shop_name,m.goods_name,m.goods_img,m.goods_price,sum(g.goods_id) as `sum` 
from `menus` as m 
join `shops` as s on s.id=m.shop_id 
join `order_goods` as g on g.goods_id=m.id
group by g.goods_id
order by `sum` desc
 limit 0,10");
        $count = '';
        foreach ($menu as $sum) {
            $count += $sum->sum;
        }
        return view('shops/count', compact('keyword', 'menu', 'count'));
    }

    public function count_day(Request $request)
    {
        $count = 0;
        $keyword = $request->keyword;
        if (!$keyword) {
            $keyword = date('Y-m', time());
        }
        $menu = DB::select("select s.shop_name,m.goods_name,m.goods_img,m.goods_price,sum(g.goods_id) as `sum` 
from `menus` as m 
join `shops` as s on s.id=m.shop_id 
join `order_goods` as g on g.goods_id=m.id
where g.created_at like '%{$keyword}%' 
group by g.goods_id
order by `sum` desc
 limit 0,10");
        $count = '';
        foreach ($menu as $sum) {
            $count += $sum->sum;
        }
        return view('shops/count_day', compact('keyword', 'menu', 'count'));
    }

    public function count_month(Request $request)
    {
        $count = 0;
        $keyword = $request->keyword;
        if (!$keyword) {
            $keyword = date('Y-m', time());
        }
        $menu = DB::select("select s.shop_name,m.goods_name,m.goods_img,m.goods_price,sum(g.goods_id) as `sum` 
from `menus` as m 
join `shops` as s on s.id=m.shop_id 
join `order_goods` as g on g.goods_id=m.id
where g.created_at like '%{$keyword}%' 
group by g.goods_id
order by `sum` desc
 limit 0,10");
        $count = '';
        foreach ($menu as $sum) {
            $count += $sum->sum;
        }
        return view('shops/count_month', compact('keyword', 'menu', 'count'));
    }

    //订单统计
    public function shop_count(Request $request)
    {
        $count = 0;
        $all = Order::where('shop_id', auth()->user()->id)->get();
        $count = count($all);
        return view('shops/count', compact('all', 'count'));
    }

    public function shop_count_day(Request $request)
    {
        $count = 0;
        $keyword = $request->keyword;
        if (!$keyword) {
            $keyword = date('Y-m-d', time());
        }
//        dd($keyword);
        $all = Order::where([['created_at', 'like', "%{$keyword}%"], ['shop_id', auth()->user()->id]])->get();

        $count = count($all);
        return view('shops/count_day', compact('keyword', 'count'));
    }

    public function shop_count_month(Request $request)
    {
        $count = 0;
        $keyword = $request->keyword;
        if (!$keyword) {
            $keyword = date('Y-m', time());
        }
        $all = Order::where([['created_at', 'like', "%{$keyword}%"], ['shop_id', auth()->user()->id]])->get();
        $count = count($all);
        return view('shops/count_month', compact('keyword', 'count'));
    }

    //生成通知
    public function sms(Request $request)
    {
        $params = array();

        // *** 需用户填写部分 ***

        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
        $accessKeyId = "LTAIxSPKgYTIQqOg";
        $accessKeySecret = "4hL67Yhhqi9C0wbSKW5vnZbzcOieOz";

        // fixme 必填: 短信接收号码
        $tel = $request->tel;
//        dd($request->tel);
        $params["PhoneNumbers"] = $tel;

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = "杜孟烽";

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = "SMS_141295035";

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $num = random_int(1000, 9999);
//        $val = Redis::set('sms' . $tel, $num);
//        Redis::expire('sms' . $tel, 900);
        $params['TemplateParam'] = Array(
            "code" => 'eleb',
            //"product" => "阿里通信"
        );

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if (!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        // fixme 选填: 启用https
        // ,true
        );
//        return $content;
//        return ([
//            "status" => "ture",
//            "message" => "验证码正确",
//        ]);
//        dd($content);
    }
}
