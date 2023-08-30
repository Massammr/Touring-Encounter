<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Follows</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
         <x-app-layout>
    <x-slot name="header">
        　フォロー＆フォロワー
        　   </x-slot>
        　   <meta name="csrf-token" content="{{ csrf_token() }}" />
        @foreach($users as $user)
<div>
  <div>{{$user->name}}</div>
  <button onclick="follow({{ $user->id }})">フォローする</button>
</div>
@endforeach
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  function follow(userId) {
    $.ajax({
      // これがないと419エラーが出ます
      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
      url: `/follow/${userId}`,
      type: "POST",
    })
      .done((data) => {
        console.log(data);
      })
      .fail((data) => {
        console.log(data);
      });
  }
</script>
</x-app-layout>
</html>