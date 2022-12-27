@extends('layout')

@section('content')


<div class="p-10 max-w-lg mx-auto mt-24 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >{{__('pay loan')}}</h2>
    <form action="/credit/{{$product->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
        <label
            for="product"
            class="inline-block text-lg mb-2"
            >{{__('product name')}}</label
        >
        <input
            type="text"
            class="border border-gray-600 rounded p-2 w-full"
            name="product"
            placeholder="Misumari nchi 4"
            value="{{$product->product}}"
            disabled
        />
        @error('product')
            <p class="text-red-500 text xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
        <p class="inline-block text-lg mb-2"> Jumla ya Deni</p>
        <p class="border border-gray-600 rounded p-2 w-full" >
            @money($product->unit_sum)
        </p>
        </div>

        <div class="mb-6">
        <p class="inline-block text-lg mb-2"> Deni lilolipwa</p>
        <p class="border border-gray-600 rounded p-2 w-full text-green-500" >
            @money($product->paid_amount)
        </p>
        </div>

        <div class="mb-6">
        <p class="inline-block text-lg mb-2"> Deni lililobaki</p>
        <p class="border border-gray-600 rounded p-2 w-full text-red-500" >
            @money($product->unit_sum - $product->paid_amount)
        </p>
        </div>

        <div class="mb-6">
            <label
                for="paid_amount"
                class="inline-block text-lg mb-2"
                >{{__('available funds')}}</label
            >
            <input
                type="text"
                class="border border-gray-600 rounded p-2 w-full"
                name="paid_amount"
                placeholder="{{@$product->unit_sum - $product->paid_amount }}"
                required
                oninvalid="this.setCustomValidity('Lazima ujaze jina la bidhaa')"
            />
            @error('paid_amount')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror
        </div>
            <button class="bg-indigo-600 text-white rounded py-2 px-4 hover:bg-indigo-700">
                Lipa Deni
            </button>
        </div>
    </form>
</div>
    
@endsection
