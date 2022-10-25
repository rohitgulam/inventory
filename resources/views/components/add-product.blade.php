<div
    {{-- x-show="open" --}}
    class="absolute left-[40%] p-10 max-w-lg mx-auto mt-24 bg-white rounded drop-shadow-xl" >

    
    <form action="/products" method="post">
        @csrf
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
                value="{{old('name')}}"
            />
            @error('name')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="category"
                class="inline-block text-lg mb-2"
                >Kundi la bidhaa</label
            >
            <input
                type="text"
                class="border border-gray-600 rounded p-2 w-full"
                name="category"
                list="categories"
                value="{{old('category')}}"
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
                    {{old('description')}}
                </textarea>
            @error('name')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror

            <button class="bg-gray-800 text-white rounded py-2 px-4 hover:bg-black">
                Ongeza Bidhaa
            </button>
        </div>
    </form>
</div>