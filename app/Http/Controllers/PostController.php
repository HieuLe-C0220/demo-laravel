<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = new Post();
        // $post->title = 'Tiền điện tăng đột biến';
        // $post->content = 'Do quạt chạy không ngừng nghỉ';
        // $post->category_id = '3';
        // $post->save();

        // $posts = Post::paginate(2);
        
        //query builder, phai ket thuc bang get() thi moi query den db
        // $posts = Post::where('id', '>', 1)->where('id' , '<=', 5)->get();
        // foreach ($posts as $post) {
        //     echo $post->title;
        // }
        // echo $posts->links();
        // $posts = Post::where('id', '>', 1)->where('id' , '<=', 5)->first();
        // echo $posts->title;
        
        //Xoá bài viết có id được chọn
        // $post = Post::find(1);
        // $post->delete();
        
        // $post = Post::find(1);
        // echo $post->title;
        // echo $post->category->name;

        // $category = Category::find(1);
        // $posts = $category->posts; // lay tat ca bai viet
        // $posts = $category->posts()->limit(10)->get(); //lay theo gioi han, cu the la 5 record
        // foreach ($posts as $post) {
        //     echo $post->title;
        // }
        
        // Truy van n-n
        // $post = Post::find(1);
        // $tags = $post->tag;
        // echo $post->title;
        // foreach ($tags as $tag) {
        //     echo $tag->name;
        // }

        // Tao record con tu cha
        // $category = Category::find(2);
        // $category->posts()->create([
        //     'title' => 'blog 3',
        //     'content' => 'Quyết tâm dập dịch'
        // ]);
        
        $post = Post::find(5);
        return response()->json($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('create_post')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
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
        // $post = Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);

    //     $request->validate([
    //         'title' => 'max:25|min:2'
    //     ]);

    //     $post = new Post;
    //     $post->fill( $request-> all() );
    //     $post->save();
    // }
    public function store(StorePostRequest $request) 
    {
        $post = new Post;
        $newData = $request->all();
        print_r($newData);die;
        $newData->title = base64_encode($request->all()->title);
        $post->fill($newData);
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
