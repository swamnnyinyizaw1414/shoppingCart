@props(['name','type'=>'text','value'=>'','required'=>''])

<x-form.input-wrapper>
    <x-form.label :name="$name" /> 
    <input {{$required}} type="{{$type}}" name="{{$name}}" value="{{old($name,$value)}}" class="form-control">
    <x-error name="{{$name}}" />
</x-form.input-wrapper>