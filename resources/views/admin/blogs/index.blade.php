<x-admin-layout>
    <h3>Blogs Lists</h3>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Intro</th>
            <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></td>
                <td>{{$blog->intro}}</td>
                <td>
                    <div class="d-flex align-items-center">
                    <a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-warning mx-1">Edit</a>
                    <form action="/admin/blogs/{{$blog->slug}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$blogs->links()}}
</x-admin-layout>