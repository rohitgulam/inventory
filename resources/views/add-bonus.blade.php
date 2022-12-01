@extends('layout')

@section('content')

<div class="p-10 max-w-lg mx-auto mt-24 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >Ongeza Bonus</h2>
    <form action="/products/bonus/{{$product->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
        <label
            for="quantity"
            class="inline-block text-lg mb-2"
            >Bonus iliyoingia</label
        >
        <input
            type="text"
            class="border border-gray-600 rounded p-2 w-full"
            name="quantity"
            required
            oninvalid="this.setCustomValidity('Lazima ujaze bonus iliyoingia')"
        />
        @error('quantity')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        

        <button class="bg-indigo-600 text-white rounded py-2 px-4 hover:bg-indigo-700">
            Badilisha
        </button>
    </form>
</div>
    
@endsection
