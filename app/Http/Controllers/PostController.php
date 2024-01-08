<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->category) {
            return PostResource::collection(Category::where('name', $request->category)
                ->firstOrFail()->posts()->latest()->get());
        } else if ($request->search) {
            return  PostResource::collection(Post::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(1)->withQueryString());
        }

        return PostResource::collection(Post::latest()->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required | image',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $title = $request->title;
        $category_id = $request->category_id;
        // ejemplo del slug: my title = my-title-1. Es una concatenacion del slug junto con el titulo y el id
        // Contamos a ver is existen Posts creados. Si no hay, se le asigna a la URL que contiene el ID el valor de "1"
        if (!Post::count()) {
            $postId = 1;
        } else {
            // tenemos algo en la DB:
            $postId = Post::latest()->first()->id + 1;
        }

        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = auth()->user()->id;
        $body = $request->input('body');
        // requesteamos el archivo, el store crea un ID especifico para la foto, public especifica que se guarde en esa ruta
        $imagePath = 'storage/' . $request->file('file')->store('postImages', 'public');
        // /storage/public/images/dshaj4123412hfjds
        // create and save post
        $post = new Post();
        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;
        $post->save();
    }

    public function show(Post $post)
    {
        if (auth()->user()->id !== $post->user->id) {
            return abort(403);
        }
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        if (auth()->user()->id !== $post->user->id) {
            return abort(403);
        }
        $request->validate([
            'title' => 'required',
            'file' => 'nullable | image',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $title = $request->title;
        $category_id = $request->category_id;


        $slug = Str::slug($title, '-') . '-' . $post->id;
        $body = $request->input('body');

        if ($request->file('file')) {
            File::delete($post->imagePath);
            $imagePath = 'storage/' . $request->file('file')->store('postsImages', 'public');
            $post->imagePath = $imagePath;
        }

        // create and save post
        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->body = $body;
        return $post->save();
    }
    public function destroy(Post $post)
    {
        if (auth()->user()->id !== $post->user->id) {
            return abort(403);
        }

        return $post->delete();
    }
}
