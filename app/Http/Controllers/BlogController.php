<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    
    public function index() {

        // $this->authorize('admin');

        return view('blogs.index',[
            "blogs" => Blog::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),  // change search(string) to search(associative array by using [])
            // "categories" => Category::latest()->get()
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show',[
            "blog"=>$blog,
            "randomBlogs"=>Blog::inRandomOrder()->take(3)->get()
        ]);
    
    }

    public function subscriptionHandler(Blog $blog){
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unsubscribe();
        }else{
            $blog->subscribe();
        }
        return back();
    }

    // protected function getBlogs(){
    //     $blogs=Blog::latest();
    
    //     if(request('search')){
    //         $blogs=$blogs
    //         ->where('title','Like','%'.request('search').'%')
    //         ->orWhere('body','Like','%'.request('search').'%')             
    //         ;
    //     }

    //     return $blogs->get();
    // }

}
