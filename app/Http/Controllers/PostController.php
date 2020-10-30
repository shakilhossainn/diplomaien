<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use PHPUnit\Framework\Constraint\FileExists;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderby('id', 'DESC')->paginate(4);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate( $request, [
            'title'=> 'required|unique:posts,title',
            'image'=> 'required|image',
            'description'=> 'required',
            'category'=> 'required',
            'user'=> 'required',
            'tags'=> 'required',
        ]);
        $posts = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => $request->user,
            'created_at' => Carbon::now(),
        ]);

        $posts->tags()->attach($request->tags);

        if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('/photos', $image_new_name);
        $posts->image = 'storage/photos/'.$image_new_name;
        $posts->save();
        }
        return redirect()->back()->with('success','New Poat Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $tags= Tag::all();
        $categories = Category::all();
        return view('admin.post.view',compact(['post','categories','tags']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags= Tag::all();
        $categories = Category::all();
        return view('admin.post.edit',compact(['post','categories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validation update post
        $this->validate( $request, [
            'title'=> 'required',
            'image'=> 'sometimes|image',
            'description'=> 'required',
            'category'=> 'required',
            'user'=> 'required',
        ]);


        $post->title = $request->title;
        $post->slug =  Str::slug($request->title, '-');
        $post->description = $request->description;
        $post->category_id = $request->category;


        $post->tags()->sync($request->tags);

        if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('storage/photos', $image_new_name);
        $post->image = 'storage/photos/'.$image_new_name;
    }
    $post->save();
        return redirect()->back()->with('success',' Poat is  Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (file_exists(public_path($post->image))){
            unlink(public_path($post->image));
        }
        $post->tags()->delete();
        $post->delete();

        return redirect()->back()->with('success','Post Deleted Successfully');
    }
}
