@props(['name'])

<button 
    id="add-product-button" 
    {{$attributes->merge(['class' => 'text-white rounded py-2 px-4' ])}}
>
    {{$name}}
</button>

