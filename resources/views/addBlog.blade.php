@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用するエラーファイル-->
        @include('common.errors')
        <!-- ブログ投稿フォーム -->
        <form action="{{ url('blogs') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- タイトルと本文-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="col-sm-3 control-label" style="padding: 0.25em 0.5em; color: #494949; border-left: solid 5px #00b4e6; font-size:15px;">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="content" class="col-sm-3 control-label" style="padding: 0.5em 0.5em; color: #494949; border-left: solid 5px #00b4e6; font-size:15px;">Content</label>
                    <textarea name="content" id="content" class="form-content" style="width:740px; height:300px"></textarea>
                </div>
            </div>
            <!-- 投稿ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Posting</button>
                </div>
            </div>
        </form>
    </div>
@endsection