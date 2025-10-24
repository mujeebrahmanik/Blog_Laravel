<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy("created_at",'desc')->paginate(10);
        return view('admin.posts',['posts'=>$posts]);
    }

    public function create(){
        return view('admin.createpost');
    }

    public function store(Request $request){
        $validated= $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts','public');
        }

        // create post
        Post::create([
            'title'=> $validated['title'],
            'description'=> $validated['description'],
            'image'=> $imagePath,
            'user_id'=>Auth::id(),
        ]);

        return redirect()->route('admin.posts')->with('success','Post Added Successfully!');

    }


    public function edit($id){
        $post=Post::findOrFail($id);
        return view('admin.editpost',['post'=>$post]);
    }

    public function update(Request $request, $id){
        $post=Post::findOrFail($id);

        $validated= $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

       // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        } else {
            $validated['image'] = $post->image;
        }

        $post->update($validated);
        return redirect()->route('admin.posts')->with('success','Post Edited Successfully');


    }

    public function destroy($id){
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts')->with('success','Post Deleted Successfully');
    }
}
