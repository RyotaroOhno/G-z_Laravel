<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Validator;

class BlogController extends Controller
{
    //投稿ページ移動
    public function addcontent(Blog $blog){
        return view('addBlog',['blog'=>$blog]); 
    }
    
    //投稿
    public function post(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'content' => 'required'
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
        return redirect('/')
           ->withInput()
           ->withErrors($validator);
        }
        // Eloquentモデル
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->good = 0;
        $blog->save();
        //「/」ルートにリダイレクト
        return redirect('/');
    }
    
    //記事一覧表示
    public function index(){
        $blogs = Blog::orderBy('id','desc')->get();
        return view('blogs',[
        'blogs'=>$blogs
        ]);
    }
    
    //グッジョブ
    public function good(Request $request){
        $blog = Blog::find($request->id);
        $blog -> increment('good');
        $blog->save();
        return redirect('/');
    }
    
    //削除
    public function destroy(Blog $blog){
        $blog->delete();
        return redirect('/');
    }
}
