@props(['name'])

@error($name)
    <p class="alert alert-danger my-1">{{$message}}</p>
@enderror