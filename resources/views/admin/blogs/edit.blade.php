<x-admin-layout>
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card col-6 p-4 my-4">
                <label for=""><h1 class="text-primary">Edit Blogs</h1></label>
                <form action="/admin/blogs/{{$blog->slug}}/update" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('patch')
                    <x-form.input name="title" :value="$blog->title" />
                    <x-form.input name="slug" :value="$blog->slug" />
                    <x-form.input name="intro" :value="$blog->intro" />
                    <x-form.text-area name="body" :value="$blog->body" />
                    <x-form.input name="thumbnail" type="file" />
                    <img src='{{asset("storage/$blog->thumbnail")}}' width="100px" height="100px" alt="">
                    <x-form.input-wrapper>
                        <x-form.label name="Category" />
                        <select name="category_id" class="form-control" id="">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id==old('category_id',$blog->category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </x-form.input-wrapper>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>