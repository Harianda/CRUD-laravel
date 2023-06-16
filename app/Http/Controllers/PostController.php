<?php

namespace App\Http\Controllers;

use App\Models\post as modelPost;
use App\Models\user as modelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = modelPost::all();

        return view('posts.index', compact('posts'));
    }

    public function show(modelPost $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $users = modelUser::all();

        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'id_user' => 'required',
            'title' => 'required',
            'picture' => 'required|image|max:2048',
        ]);

        // $picturename = time().'.'.$request->picture->extension();

        // $picturePath = $request->picture->store('pictures', $picturename);
        // $validatedData['picture'] = $picturePath;

         // Upload the picture
         if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $picturePath = $picture->move('pictures');
            $validatedData['picture'] = $picturePath;
        }

        modelPost::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit(modelPost $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, modelPost $post)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'title' => 'required',
            'picture' => 'required',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(modelPost $post)
    {
        // Delete the picture file if it exists
        $image_name = $post->picture;
        $image_path = ($image_name);
        if(file_exists($image_path)){
          unlink($image_path);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
