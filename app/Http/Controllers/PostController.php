<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::paginate(2);
        
        //query builder, phai ket thuc bang get() thi moi query den db
        // $posts = Post::where('id', '>', 1)->where('id' , '<=', 5)->get();
        // foreach ($posts as $post) {
        //     echo $post->title;
        // }
        // echo $posts->links();
        // $posts = Post::where('id', '>', 1)->where('id' , '<=', 5)->first();
        // echo $posts->title;

        // $post = Post::find(1);
        // $post->delete();
        
        // $post = Post::find(1);
        // echo $post->title;
        // echo $post->category->name;

        $category = Category::find(1);
        $posts = $category->posts; // lay tat ca bai viet
        // $posts = $category->posts()->limit(5)->get(); //lay theo gioi han, cu the la 5 record
        foreach ($posts as $post) {
            echo $post->title;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cach 1: them du lieu vao db
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        // Cach 2 them du lieu vao db
        // dd( $request->all() ); // Kiem tra xem $request->all hien thi cai gi
        // $post = new Post;
        // $post->fill( $request-> all() );
        // $post->save();

        // Cach 3 them du lieu vao db
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::find($id);
        echo $post->title;
        return '';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit_post')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Doi voi tham so la $id
        // Post::whereId($id)->update([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // $post->fill( $request-> all() );
        // $post->save();
        return view('edit_post')->with('post', $post);
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
