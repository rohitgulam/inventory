@extends('layout')

@section('content')
<div class="flex justify-center items-center h-[80vh]">
    <div class="border rounded-md border-2 p-6 bg-slate-300">
        <p class="font-bold text-2xl text-center">CREATE NEW USER</p>
        <form action="/users" method="post">
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
                    for="username"
                    class="inline-block text-lg mb-2"
                    >Username</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full"
                    name="username"
                    required
                />
                @error('username')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 mr-1">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                    >Password</label
                >
                <input
                    type="password"
                    class="border border-gray-600 rounded p-2 w-full"
                    name="password"
                    required
                />
                @error('password')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" value="1" id="status" class="sr-only peer" name="status">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 ">Super User</span>
                  </label>

                @error('status')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-2 px-4"
            >
                Create User
            </button>
        </form>
    </div>
</div>
@endsection