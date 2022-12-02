@extends('layout')

@section('content')
<div class="flex justify-center items-center h-[80vh]">
    <div class="border rounded-md border-2 p-6">
        <p class="font-bold text-2xl text-center">Make Transport</p>
        <form action="/transport/make" method="post">
            @csrf
            @method('POST')
            <div class="mb-6 mr-1">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                    >Name</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full"
                    name="name"
                    required
                />
                @error('name')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 mr-1">
                <label
                    for="issued_by"
                    class="inline-block text-lg mb-2"
                    >Issued by</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full"
                    name="issued_by"
                    required
                />
                @error('issued_by')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 mr-1">
                <label
                    for="amount"
                    class="inline-block text-lg mb-2"
                    >Amount</label
                >
                <input
                    type="number"
                    class="border border-gray-600 rounded p-2 w-full"
                    name="amount"
                    required
                />
                @error('amount')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-2 px-4"
            >
                Make Transport
            </button>
        </form>
    </div>
</div>
@endsection