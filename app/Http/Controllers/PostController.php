<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstwhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstwhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }

    public function showcategories()
    {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }

    public function showcontact()
    {
        return view('contact', [
            "title" => "Contact Me",
            "name" => "Fikri Hidayat",
            "email" => "fikroyz@gmail.com",
            "no" => "085774190855",
            "image" => "fikri.jpg",
            "active" => 'contact'
        ]);
    }

    public function showmain()
    {
        return view('home', [
            "title" => "Home",
            "active" => 'home'
        ]);
    }

    public function postcomment(Request $request)
    {
        // Tes apakah request masuk
        $request->request->add(['user_id' => auth()->user()->id]);
        // dd($request->all());
        Comment::create($request->all());
        return redirect()->back()->with('success', 'Add Comment Success');
    }
}
