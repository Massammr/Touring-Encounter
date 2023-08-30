<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
         <x-app-layout>
    <x-slot name='header'>
        　投稿一覧
        　   </x-slot>
        <h1 style='font-size:2em;'>Blog Name</h1>
        <a href='/posts/create' style='color:gray;'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post' style='border:solid 1px; margin-top: 50px;'>
                    <h2 class='title' style='font-size:1.5em;'>
    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
    @csrf
    @method('DELETE')
    <button type="button" onclick="deletePost({{ $post->id }})" style='color:red;'>delete</button> 
    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
            </body>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</x-app-layout>
</html>