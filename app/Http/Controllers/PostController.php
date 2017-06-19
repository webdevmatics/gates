<?php

namespace App\Http\Controllers;

use App\Post;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($id)
    {
        $post = Post::where('published', true)->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $data            = $request->only('title', 'body');
        $data['slug']    = str_slug($data['title']);
        $data['user_id'] = auth()->user()->id;
        $post            = Post::create($data);
        return redirect()->route('edit_post', ['id' => $post->id]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $data         = $request->only('title', 'body');
        $data['slug'] = str_slug($data['title']);
        $post->fill($data)->save();
        return back();
    }

    public function drafts()
    {
        $draftsQuery = Post::where('published', false);

        if (Gate::denies('see-all-drafts')) {
            $draftsQuery = $draftsQuery->where('user_id', auth()->user()->id);
        }
        $posts = $draftsQuery->paginate();

        return view('posts.drafts', compact('posts'));
    }

    public function publish(Post $post)
    {
        $post->published = true;
        $post->save();
        return back();
    }

}
