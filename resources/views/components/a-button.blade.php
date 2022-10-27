@props(['name'])

<a 
    href="purchase/create" 
    {{$attributes->merge(['class' => 'text-white rounded py-3 px-4' ])}}
>
    {{$name}}
</a>

