<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Category;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('En');
        $posts = Post::latest()->paginate(8);
        foreach ($posts as $post) {
            $post->setAttribute('user',$post->user);
            $post->setAttribute('added',Carbon::parse($post->created_at)->diffForHumans());
            $post->setAttribute('path','/post/'.$post->slug);
            $post->setAttribute('category',$post->category);
        }
        return response()->json($posts);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return 'dd';
        Carbon::setLocale('En');
        return response()->json([
            'id' => $post->id,
            'title' => $post->title,
            'image' => $post->image,
            'content' => $post->content,
            'created_at' => $post->created_at->diffForHumans(),
            'user' => $post->user->name,
            'category' => $post->category->name,
            'comments_count' => $post->comments->count(),
            'comments' => $this->commentsArray($post->comments)
        ]);
    }

    public function commentsArray($comments)
    {
        $jsonComments = [];
        if ($comments) {
            
        foreach ($comments as $comment) {
            array_push($jsonComments,[
                'id' => $comment->id,
                'content' => $comment->content,
                'created_at' => $comment->created_at->diffForHumans(),
                'user' => $comment->user->name,
            ]); 
    } 
        return $jsonComments;
        }
        return $comments;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function postsByCategory($slug)
    {
        $results = [];
        $category= Category::where('slug', $slug)->first();

        $posts = Post::where('category_id',$category->id)->get();

        foreach ($posts as $post) {
            $post->setAttribute('user',$post->user);
            $post->setAttribute('added',Carbon::parse($post->created_at)->diffForHumans());
            $post->setAttribute('path','/post/'.$post->slug);
            $post->setAttribute('category',$post->category);
        }
       
        // $results = [$categoryname,$posts];
        // $jsnres = json_encode( $results);
        return response()->json( $posts );
    }
}
