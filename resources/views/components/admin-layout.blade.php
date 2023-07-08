<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-4">
            <ul class="list-group">
                <a href="/admin/blogs" class="text-decoration-none"><li class="list-group-item">Dashboard</li></a>
                <a href="/admin/blogs/create" class="text-decoration-none"><li class="list-group-item">Create Posts</li></a>
            </ul>
            </div>
            <div class="col-md-10">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>