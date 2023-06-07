<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        try{
            Post::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'status' => 1,
                'author'=> auth()->user()->id,
                'published_at'=> $request->published_at
            ]);
            return ['status'=> true, 'message' => 'Successfully added'];

//            return redirect(route('post.index'))->with('success', 'Successfully added');
        }catch(Exception $ex){
            return ['status'=> false, 'message' => 'Error occurred while saving'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        die('here');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       return view('post.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        try{
            $post->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'status' => 1,
                'published_at'=> $request->published_at,
                'author'=> auth()->user()->id,
            ]);
            return redirect(route('post.index'))->with('success', 'Successfully updated');
        }catch(\Exception $ex){
            return redirect(route('post.index'))->with('error', 'Error occurred while saving');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{
            $post->delete();
            return redirect(route('post.index'))->with('success', 'Successfully deleted');
        }catch(\Exception $ex){
            return redirect(route('post.index'))->with('error', 'Error occurred while deleting');
        }

    }
}
