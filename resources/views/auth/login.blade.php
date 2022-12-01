<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login | KG Transporters</title>
</head>
<body class="bg-[#E5E5E5]">
    <div class="flex flex-col justify-center items-center h-screen">
        <p class="font-bold text-2xl text-center py-4 ">KG Transporters</p>
        <div class="border rounded-md border-2 p-6 bg-slate-300">
            <p class="font-bold text-2xl text-center">LOGIN</p>
            <form action="/user/authenticate" method="post">
                @csrf
                @method('POST')
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
                        >Passowrd</label
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
                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-2 px-4"
                >
                    Log In 
                </button>
            </form>
        </div>
    </div>
</body>
</html>