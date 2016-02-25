<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest('updated_at')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.form');
    }

    public function store(PostRequest $request)
    {
        Post::create($request->all());
        flash('Create post success!', 'success');
        return redirect('admin/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.form', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $post = Post::find($id);
        $post->update($request->all());
        flash('Update post success!', 'success');
        return redirect('admin/posts');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        flash('Success deleted post!');
        return redirect('admin/posts');
    }

}
