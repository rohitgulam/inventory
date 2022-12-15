@extends('layout')

@section('content')

<div class="p-10 max-w-lg mx-auto mt-24 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >{{__('Add product')}}</h2>
    <form action="/products/{{$product->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
        <label
            for="name"
            class="inline-block text-lg mb-2"
            >{{__('Product name')}}</label
        >
        <input
            type="text"
            class="border border-gray-600 rounded p-2 w-full"
            name="name"
            placeholder="Misumari nchi 4"
            value="{{$product->name}}"
            required
            oninvalid="this.setCustomValidity('Lazima ujaze jina la bidhaa')"
        />
        @error('name')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
        <label
            for="quantity"
            class="inline-block text-lg mb-2"
            >{{__('Product quantity')}}</label
        >
        <input
            type="number"
            class="border border-gray-600 rounded p-2 w-full"
            name="quantity"
            placeholder="Idadi ya bidhaa store"
            value="{{$product->quantity}}"
        />
        @error('quantity')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
        <label
            for="selling_price"
            class="inline-block text-lg mb-2"
            >{{__('Selling Price')}}</label
        >
        <input
            type="number"
            class="border border-gray-600 rounded p-2 w-full"
            name="selling_price"
            value="{{$product->selling_price}}"
        />
        @error('selling_price')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
        <label
            for="buying_price"
            class="inline-block text-lg mb-2"
            >{{__('Buying Price')}}</label
        >
        <input
            type="number"
            class="border border-gray-600 rounded p-2 w-full"
            name="buying_price"
            value="{{$product->buying_price}}"
        />
        @error('buying_price')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
            <label
                for="category"
                class="inline-block text-lg mb-2"
                >{{__('Product category')}}</label
            >
            <input
                type="text"
                class="border border-gray-600 rounded p-2 w-full"
                name="category"
                list="categories"
                value="{{$product->category}}"
            />
            <datalist>
                <option value="misumari"> Misumari</option>
                <option value="nyundo"> Nyundo</option>
            </datalist>
            @error('name')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
                >{{__('Product description')}}</label
        >
            <textarea
                    class="border border-gray-600 rounded p-1 w-full"
                    name="description"
                    rows="3"
                    placeholder="Maelezo kidogo kuhusu bidhaa"
                    
                >
                {{$product->description}}
                </textarea>
            @error('name')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror

            <button class="bg-indigo-600 text-white rounded py-2 px-4 hover:bg-indigo-700">
                {{__('Change')}}
            </button>
        </div>
    </form>
</div>
    
@endsection
