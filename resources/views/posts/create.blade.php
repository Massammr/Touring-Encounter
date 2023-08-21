<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
          <x-app-layout>
    <x-slot name="header">
        　新規投稿作製
        　   </x-slot>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"value="{{ old('post.title') }}"/>
           <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image[]" multiple>
            </div>
            <input type="submit" value="保存" style='cursor: pointer;'/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
           </body>
    </x-app-layout>
</html>