<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function show($id)
    {
        $posts = Post::with(['comments','category','creator'])->where('status',1)->where('category_id',$id)->orderBy('id','DESC')->paginate(5);

        return view('front.categories', compact('posts'));
    }
}
