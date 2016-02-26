<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends AdminController
{
    public $tags;

    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tags = Tag::lists('name', 'name')->all();
    }


    protected function syncTags($request, Post $post)
    {
        $tagIds = [];
        foreach ($request->input('tag_list') as $tag) {
            $tagIds[] = Tag::firstOrCreate(['name' => $tag])->id;
        }
        $post->tags()->sync($tagIds);
    }

    public function index()
    {
        $posts = Post::latest('updated_at')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $tags = $this->tags;
        return view('admin.post.form', compact('tags'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['image'] =  ($request->file('image') && $request->file('image')->isValid()) ? $this->saveImage($request->file('image')) : '';
        $post = Post::create($data);
        $this->syncTags($request, $post);
        flash('Create post success!', 'success');
        return redirect('admin/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $tags = $this->tags;
        return view('admin.post.form', compact('tags', 'post'));
    }

    public function update($id, PostRequest $request)
    {
        $data = $request->all();
        $post = Post::find($id);
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $post->image);
        }
        $post->update($data);
        $this->syncTags($request, $post);
        flash('Update post success!', 'success');
        return redirect('admin/posts');
    }

    public function destroy($id)
    {
       $post = Post::find($id);
        if (file_exists(public_path('files/' . $post->image))) {
            @unlink(public_path('files/' . $post->image));
        }
        $post->delete();
        flash('Success deleted post!');
        return redirect('admin/posts');
    }

}
