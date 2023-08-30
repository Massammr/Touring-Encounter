<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use App\Models\User;
use App\Models\Comment;
use App\Models\Image;


class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
{
    return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    //$postの中身を戻り値にする。
}

 public function show(User $user,Post $post, Comment $comment, Image $image)
    {
        // dd($post->images()->get());
        // $image_get = Image::where('post_id', '=', $post->id)->get();
        return view('posts.show')->with(['post' => $post, 'images' => $post->images()->get(), 'comments' => $post->comments()->get()]);
    }

public function create()
{
    return view('posts.create');
}

public function store(PostRequest $request, Post $post , Image $image)
{
   
    $input = $request['post'];
   $input['user_id'] = Auth::id();
    $post->fill($input)->save();///id
      if( $request->file('image')){ 
    $images = $request->file('image');
    foreach($images as $pimage){
            $image_url = Cloudinary::upload($pimage->getRealPath())->getSecurePath();
        
        $image = New Image();
        $image->image_url = $image_url;
     $image->post_id = $post->id;
    $image->save();
    //  dd($image);　　ファイルの数が５つ以上だと投稿拒否
            }
    }
    
   
    return redirect('/posts/'.$post->id);
}

// public function images_store(PostRequest $request, image $image)
// {
//     $input = $request['image'];
//   $input['user_id'] = Auth::id();
// //   dd($input);
//     // auth
//     // $input += ['user_id' => $request->user()->id];    //この行を追加
//     if($request->file('image')){ 
//      $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
//             $input += ['image_url' => $image_url];
//               }
//     $image->fill($input)->save();
   
//     return redirect('/posts/'.$post->id);
// }

public function edit(Post $post)
{
    return view('posts.edit')->with(['post' => $post]);
}

public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    // $input_post += ['user_id' => $request->user()->id];    //この行を追加
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
}

public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}

}
