<x-layout>
    
    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 my-3 mx-auto text-center">
          <img
            src='{{asset("storage/$blog->thumbnail")}}'
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div class="">
            <div class="text-warning ">Author - <a href="/?author={{$blog->author->userName}}">{{$blog->author->name}}</a></div>
            <div class=""><a href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></div>
            <div class="text-secondary">{{$blog->created_at->format('F j, Y, g:i a')}}</div>
            <div class="text-secondary my-2">
            <form action="/blogs/{{$blog->slug}}/subscription" method="post">
              @csrf
              @auth
                @if(auth()->user()->isSubscribed($blog))       <!-- otherway = $blog->suscribers && $blog->suscribers->contains('id',auth()->id()) -->
                <button class="btn btn-danger">Unsuscribe</button>
                @else
                <button class="btn btn-warning">Suscribe</button>
                @endif
              @endauth
            </form>
            </div>
          </div>
          <p class="lh-md mt-2">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col-md-8 mx-auto">
        @auth
          <x-comment-form :blog="$blog" />
        @else
        <p class="text-danger text-center my-3">You need to register or login first to participate in comment section!!!</p>
        @endauth  
      </div>
    </div>

    @if($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
    
</x-layout>
