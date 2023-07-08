@props(['name','value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name" /> 
    <textarea required name="{{$name}}" id="" cols="20" rows="6" class="form-control">{{old($name,$value)}}</textarea>
    <x-error name="{{$name}}" />
</x-form.input-wrapper>