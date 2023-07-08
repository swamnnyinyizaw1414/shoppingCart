<x-admin-layout>
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card col-6 p-4 my-4">
                <label for=""><h1 class="text-primary">Create Blogs</h1></label>
                <form action="/admin/blogs/store" enctype="multipart/form-data" method="post">
                    @csrf
                    <x-form.input name="title" required="required" />
                    <x-form.input name="slug" required="required" />
                    <x-form.input name="intro" required="required" />
                    <x-form.text-area name="body" required="required" />
                    <x-form.input name="thumbnail" type="file" />
                    <x-form.input-wrapper>
                        <x-form.label name="Category" />
                        <select name="category_id" class="form-control" id="">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id==old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </x-form.input-wrapper>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>