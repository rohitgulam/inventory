<div
    id="add-product-form"
    class="fixed left-0 top-0 p-10 w-full h-[100vh] mx-auto bg-opacity rounded drop-shadow-2xl hidden z-10" >

    <div
        class="absolute left-[40%] p-10 max-w-lg mx-auto mt-10 bg-white rounded drop-shadow-2xl" 
    >

    <button id="close-product-button" class="absolute top-2 right-2 text-red-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
    </button>



<h2 class="text-xl pb-2 font-bold" >{{(__'Add Product')}}</h2>
    <form action="/products" method="post">
        @csrf
            <div class="flex">
                <div class="mb-6 mr-1">
                    <label
                        for="name"
                        class="inline-block text-lg mb-2"
                        >Jina la bidhaa{{__('Product Name')}}</label
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
                <div class="mb-6 ml-1">
                    <label
                        for="quality"
                        class="inline-block text-lg mb-2"
                        >Ubora wa bidhaa{{__('Product Quality')}}</label
                    >
                    <input
                        type="text"
                        class="border border-gray-600 rounded p-2 w-full"
                        name="quality"
                        value="{{old('quality')}}"
                    />
                    @error('quality')
                        <p class="text-red-500 text xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>


            <div class="mb-6">
                <label
                    for="category"
                    class="inline-block text-lg mb-2"
                    >Kategoria ya bidhaa{{__('Product category')}}</label
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
                    for="selling_price"
                    class="inline-block text-lg mb-2"
                    >Bei ya kuuza </label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full"
                    name="selling_price"
                    value="{{old('selling_price')}}"
                />
                @error('selling_price')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="branch"
                    class="inline-block text-lg mb-2"
                >
                    Branch
                </label>

                <select name="branch" id="branch" class="border border-gray-600 rounded p-2 w-full">
                    <option value="hardware">Hardware</option>
                    <option value="tofali">Tofali</option>
                    <option value="cement">Cement</option>
                </select>
                @error('branch')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="metric"
                    class="inline-block text-lg mb-2"
                >
                    Uuzaji wa bidhaa{{__('Product Sale')}}
                </label>

                <select name="metric" id="metric" class="border border-gray-600 rounded p-2 w-full">
                    <option value="kilo">Kwa kilo</option>
                    <option value="units">Units</option>
                </select>
                @error('metric')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                

                
            </div>

            <div class="mb-6">
                <label for="bonus" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" value="1" id="bonus" class="sr-only peer" name="bonus">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 ">Bonus</span>
                  </label>

                @error('bonus')
                    <p class="text-red-500 text xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                    >Maelezo ya bidhaa{{__('Product Description')}}</label
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

                <x-button 
                    class="bg-indigo-600 hover:bg-indigo-700"
                    name="Ongeza" 
                />
                
            </div>
        </form>
    </div>
</div>
