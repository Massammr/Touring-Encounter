<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <x-app-layout>
    <x-slot name="header">
        　投稿詳細
        　   </x-slot>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div style = 'display:flex;'>
               @foreach ($images as $image)
         @if($image->image_url)
                <div>
                    <img src='{{ $image->image_url}}' alt="画像が読み込めません。"/>
                </div>
            @endif
                @endforeach
                </div>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
            <p class="comment">[<a href="/posts/{{ $post->id }}/create">コメント作成]</p>
            <a href="/">戻る</a>
        </div>
         <div>
            @foreach ($comments as $comment)
                <p>コメント：{{ $comment->body }}</p>
                <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteComment({{ $comment->id }})">削除</button> 
                </form>
            @endforeach
        </div>
        <script>
            function deleteComment(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        </body>
    </x-app-layout>
</html>