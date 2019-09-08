@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用するエラーファイル-->
        @include('common.errors')
      
        <!-- この下に投稿した記事を表示 -->
        <!-- 表示領域 -->
        @if (count($blogs) > 0)
           <div class="panel panel-default">
               <div class="panel-heading" style="padding: 0.25em 0.5em; color: #494949; border-left: solid 5px #7db4e6; font-size:30px;">List of Articles</div>
               <div class="panel-body">
                   <table class="table table-striped blog-table">
                       <!-- テーブルヘッダ -->
                       <thead>
                           <th>&nbsp;</th>
                       </thead>
                       <!-- テーブル本体 -->
                       <tbody>
                           @foreach ($blogs as $blog)
                                <tr>
                                    <td class="table-text">
                                        <div style="font-size:20px;">Title：{{ $blog->title }} </div> 
                                        <div style="font-size:13px;">Post date：{{ $blog->created_at }} </div>
                                        <br>
                                        <div>{{ $blog->content }}</div>
                                    </td>
                                    <td style="text-align:right;" >
                                       <!-- Good Jobボタン -->
                                        <form action="{{ url('blog/good') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">Good Job! 【{{ $blog->good }}】</button>
                                            <input type="hidden" name="id" value="{{$blog->id}}" />
                                                {{ csrf_field() }}
                                        </form>
                                            <br>
                                        <!-- 削除ボタン -->
                                        <form action="{{ url('blog/'.$blog->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
        @endif
        <!-- 投稿ボタン -->
       <form action="{{ url('addBlog/'.$blog->id) }}" method="POST">
           {{ csrf_field() }}
           <button type="submit" class="btn btn-primary">Post</button>
       </form>
    </div>
@endsection