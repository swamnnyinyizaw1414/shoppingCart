<?php

namespace App\Http\Controllers;

use App\Mail\SuscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){
        request()->validate([
            'body' => ['required','min:10']
        ]);

        $blog->comments()->create([
            'blog_id'=>$blog->id,
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

       $suscribers=$blog->subscribers->filter(fn($subscriber) => $subscriber->id != auth()->id());

       $suscribers->each(function ($suscriber) use($blog){
            Mail::to($suscriber->email)->queue(new SuscriberMail($blog));
       });

       

        return redirect('blogs/'.$blog->slug);
    }
}
