@props(['blog'])
    
    <div class="card">
        <img
            src='{{asset("storage/$blog->thumbnail")}}'
            class="card-img-top"
            alt="..."
        />
        <div class="card-body">
            <h3 class="card-title">{{$blog->title}}</h3>
            <p class="fs-6 text-secondary">
            <a href="/?author={{$blog->author->userName}}">{{$blog->author->name}}</a>
            <span> -{{$blog->created_at->format('F j, Y, g:i a')}}</span>
            </p>
            <div class="tags my-3">
            <span class="badge bg-warning"><a href="/?category={{$blog->category->slug}}" class="text-success text-decoration-none">{{$blog->category->name}}</a></span>
            </div>
            <p class="card-text">
            {{$blog->intro}}
            </p>
            <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
        </div>
    </div>
        