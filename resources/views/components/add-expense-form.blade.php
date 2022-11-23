<div
    id="add-expense-form"
    class="fixed left-0 top-0 p-10 w-full h-[100vh] mx-auto bg-opacity rounded drop-shadow-2xl hidden z-10" >

    <div
        class="absolute left-[40%] p-10 max-w-lg mx-auto mt-10 bg-white rounded drop-shadow-2xl" 
    >

    <button id="close-expense-button" class="absolute top-2 right-2 text-red-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
    </button>



<h2 class="text-xl pb-2 font-bold" >Ongeza Matumizi</h2>
    <form action="/expenses" method="post">
        @csrf

        <div class="mb-6 mr-1">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >Jina la matumizi</label
            >
            <input
                type="text"
                class="border border-gray-600 rounded p-2 w-full"
                name="name"
                placeholder="Misumari nchi 4"
                value="{{old('name')}}"
                required
                oninvalid="this.setCustomValidity('Lazima ujaze jina la bidhaa')"
            />
            @error('name')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror
        </div>
            <x-button 
                class="bg-indigo-600 hover:bg-indigo-700"
                name="Ongeza" 
            />
        </form>
    </div>
</div>