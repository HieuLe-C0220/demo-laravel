<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = new Category();
        // $category->name = 'xyz';
        // $category->save();

        // $categories = Category::with('posts')->get();
        // $categories = Category::with('posts:id,category_id,title')->get();
        // dd($categories); // dd dung nhu console.log

        //with với 1 mảng
        $categories = Category::with(['posts' => function ($query){
            // $query->where('id', '<', 2);
            $query->latest()->limit(5);
        }])->get();
        foreach ($categories as $category) {
            echo $category->name;
            echo '<br/>';
            foreach ($category->posts as $post) {
                echo $post->title;
                echo '<br/>';
            }
        }
        // return 'day la danh sach chuyen muc';
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
    public function show(Category $category)
    {
        $category->load('posts');
        echo $category->name;
        echo '<br/>';
        foreach ($category->posts as $post) {
            echo $post->title;
            echo '<br/>';
        }
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
