<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Post;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $video = new Video();
        // $video->path = 'video/2.mp4';
        // $video->save();
        
        // Add new comment for video
        // $video = Video::find(1);
        // $comment = new Comment();
        // $comment->content = 'Noi dung comment 1';
        // $video->comments()->save($comment);

        // Add new comment for post
        $post = Post::find(1);
        $comment = new Comment();
        $comment->content = 'Noi dung comment cho blog 1';
        $post->comments()->save($comment);

        $video = Video::with('comments')->find(1);
        foreach ($video->comments as $comment) {
            echo $comment->content;
        }

        $post = Post::with('comments')->find(1);
        foreach ($post->comments as $comment) {
            echo $comment->content;
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
