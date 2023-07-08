<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[BlogController::class,'index']);

Route::get('blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\d\-_]+'); //wildcard constraint

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscriptionHandler']);

//first method
// Route::get('/admin/blogs',[AdminBlogController::class,'index'])->middleware('can:admin');   //using gate(authorization) as a middleware to filter the route
// Route::get('/admin/blogs/create',[AdminBlogController::class,'create'])->middleware('admin');
// Route::post('/admin/blogs/store',[AdminBlogController::class,'store'])->middleware('admin');
// Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy'])->middleware('admin');
// Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit'])->middleware('admin');
// Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update'])->middleware('admin');

//second method 
Route::middleware('can:admin')->group(function(){   //Middleware by grouping routes
    Route::get('/admin/blogs',[AdminBlogController::class,'index'])->middleware('can:admin');   //using gate(authorization) as a middleware to filter the route
    Route::get('/admin/blogs/create',[AdminBlogController::class,'create'])->middleware('admin');
    Route::post('/admin/blogs/store',[AdminBlogController::class,'store'])->middleware('admin');
    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy'])->middleware('admin');
    Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit'])->middleware('admin');
    Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update'])->middleware('admin');
});

Route::get('/register',[AuthController::class,'index'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');



// Route::get('/categories/{category:slug}',function(Category $category){
    
//     return view('blogs',[
//         "blogs"=>$category->blogs,
//         "categories"=>Category::latest()->get(),
//         "currentCategory" => $category
//     ]);
// });

// Route::get('/users/{user:userName}',function(User $user){
//     return view('blogs',[
//         'blogs' => $user->blogs, 
//         // 'categories'=>Category::latest()->get()
//     ]);
// });