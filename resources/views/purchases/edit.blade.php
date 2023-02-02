@extends('layout')

@section('content')


<div class="p-10 max-w-lg mx-auto mt-24 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >{{__('Edit Purchase')}}</h2>
    <form action="/purchases/{{$product->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
        <label
            for="product"
            class="inline-block text-lg mb-2"
            >{{__('Product Name')}}</label
        >
        <input
            type="text"
            class="border border-gray-600 rounded p-2 w-full"
            name="product"
            value="{{$product->product}}"
            disabled
        />
        @error('product')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
        <label
            for="quantity"
            class="inline-block text-lg mb-2"
            >{{__('Quantity')}}</label
        >
        <input
            type="text"
            class="border border-gray-600 rounded p-2 w-full"
            name="quantity"
            value="{{$product->quantity}}"
        />
        @error('quantity')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
        <label
            for="price"
            class="inline-block text-lg mb-2"
            >{{__('Single Price')}}</label
        >
        <input
            type="text"
            class="border border-gray-600 rounded p-2 w-full"
            name="price"
            value="{{$product->price}}"
        />
        <p class="text-gray-700 text-sm" >The total price will calculate itself</p>
        @error('price')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        </div>
        

        <button class="bg-indigo-600 text-white rounded py-2 px-4 hover:bg-indigo-700">
            {{__('Edit')}}
        </button>
    </form>
</div>
    
@endsection
