<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $keyword = '';
        $time = date('Y-m-d',time());
        if($request->keyword){
            $keyword = $request->keyword;
            if ($keyword==1){
                $Article = Article::where('start_time','>',$time)->paginate(10);
            }elseif ($keyword==2){
                $Article = Article::where([['start_time','<',$time],['end_time','>',$time]])->paginate(10);
            }elseif ($keyword==3){
                $Article = Article::where('end_time','<',$time)->paginate(10);
            }
//            $all = Member::where('username','like','%'.$keyword.'%')->paginate(5);//包含功能分页搜索
        }else{
            $Article = Article::paginate(5);
        }


        return view('Article/index', compact('Article'));
    }

    public function create()
    {
        $Article = Article::all();
//        $permission = Permission::all();
        return view('Article/create', compact('Article'));
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
            'start_time' => 'required',
            'end_time' => 'required',
        ], [
            'title.required' => '名称不能为空',
            'content.required' => '详情不能为空',
            'start_time.required' => '开始时间不能为空',
            'end_time.required' => '结束时间不能为空',
        ]);
//        dd($request->start_time);
        $Article = Article::create(array(
            'title' => $request->title,
            'content' => $request->input('content'),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ));
        //设置提示信息
        $this->gethtml();
        $this->getshow($Article);
        session()->flash('success', '添加成功');
        return redirect()->route('Article.index');
    }

    public function edit(Article $Article)
    {
        $all = Article::all();
        return view('Article/edit', compact('Article', 'all'));
    }

    public function update(Article $Article, Request $request)
    {
        //数据验证
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ], [
            'title.required' => '名称不能为空',
            'content.required' => '详情不能为空',
            'start_time.required' => '开始时间不能为空',
            'end_time.required' => '结束时间不能为空',
        ]);
        $Article->update([
            'title' => $request->title,
            'content' => $request->input('content'),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        //设置提示信息
        $this->gethtml();
        $this->getshow($Article);
        session()->flash('success', '修改成功');
        return redirect()->route('Article.index');
    }

    public function show(Article $Article)
    {
        return view('Article/show',compact('Article'));
    }

    public function destroy(Article $Article)
    {
        $Article->delete();
        return redirect()->route('Article.index');
    }

    public function gethtml()
    {
        $Article = Article::all();
        $view = view('Article/index2',compact('Article'));
        file_put_contents('art/index.html',$view);
    }
    public function getshow(Article $Article)
    {
        $view = view('Article/show2',compact('Article'));
        file_put_contents('show/index'.$Article->id.'.html',$view);
    }
}
