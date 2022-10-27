@extends('layout')

@section('content')

<div class="p-10 max-w-lg mx-auto mt-24 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >Ongeza bidhaa</h2>
    <form action="/products/{{$product->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
        <label
            for="name"
            class="inline-block text-lg mb-2"
            >Jina la bidhaa</label
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
            >Idadi ya bidhaa</label
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
                for="category"
                class="inline-block text-lg mb-2"
                >Kategoria ya bidhaa</label
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
                >Maelezo ya bidhaa</label
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
                Badilisha
            </button>
        </div>
    </form>
</div>
    
@endsection
