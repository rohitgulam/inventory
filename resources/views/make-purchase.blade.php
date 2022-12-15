@extends('layout')

@section('content')

<div class="p-10 max-w-5xl mx-auto mt-16 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >{{__('Make purchase')}}</h2>
    <form action="/purchases" method="post">
        @csrf
        <div class="">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >{{__('Find Product')}}</label
            >
            <input
                type="text"
                id="search-product"
                class="border border-gray-600 rounded p-2 w-full"
                name="name"
                placeholder="Misumari nchi 4"
                autocomplete="off"
            />
            @error('name')
                <p class="text-red-500 text xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div id="searchProductResults" class="py-4 mb-4 bg-gray-200 drop-shadow-xl hidden">
        </div>
    </form>
        

        <table id="edit_table" class="table-auto text-left hidden">
            <thead>
                <tr>
                    
                    <th class="pr-12 pl-4 py-2" >{{__('product name')}}</th>
                    <th class="pr-12 pl-4 py-2">{{__('quantity')}}</th>
                    <th class="pr-12 pl-4 py-2">{{__('price')}}</th>
                    <th class="pr-12 pl-4 py-2"></th>
                </tr>
                    
            </thead>
            <tbody class="text-gray-500">
                    <tr>
                        <td class="pr-12 pl-4 py-2 text-center" >
                            <div class="relative z-0">
                                <input type="text" id="name_input" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Bidhaa" disabled />
                                
                            </div>
                        </td>
                        <td class="pr-12 pl-4 py-2 text-center" > 
                            <div class="relative z-0">
                                <input type="number" id="quantity_input" class="order_input block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="12" />
                                
                            </div>
                        </td>
                        <td class="pr-12 pl-4 py-2 text-center" > 
                            <div class="relative z-0">
                                <input type="number" pattern="([0-9]{1,3}).([0-9]{1,3})" id="price_input" class="order_input block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="2300" />
                            </div>
                        </td>
                        <td>
                            <button id="confirm_order" class="rounded py-2 px-4 bg-gray-300 text-black">
                                {{__('Add')}}
                            </button>
                        </td>
                    </tr>
            </tbody>
        </table>

        <div class="mt-40">
            <h2 class="text-2xl">{{__('product order')}}</h2>
            <table id="edit_table" class="table-auto text-left ">
                <thead>
                    <tr>
                        
                        <th class="pr-12 pl-4 py-2" >{{__('product name')}}</th>
                        <th class="pr-12 pl-4 py-2">{{__('quantity')}}</th>
                        <th class="pr-12 pl-4 py-2">{{__('buying price')}}</th>
                        <th class="pr-12 pl-4 py-2">{{__('total')}}</th>
                    </tr>
                </thead>
                <tbody id="orderedItems" class="text-gray-500">
                    
                </tbody>
            </table>
            <div class="flex justify-between w-4/5 px-5 border border-0 border-t-4 my-4" >
                <span class="text-2xl font-bold" >{{__('Total Order')}}</span>
                <span class="text-2xl font-bold" id="orderSum">0</span>
            </div>
        </div>
        
        <div class="my-4">
            <form action="/purchase/order/create" method="post">
                @csrf
                @method('POST')
                <input class="hidden" type="text" id="ordersDB" name="orders" hidden>
                <input class="hidden" type="text" id="order_sumDB" name="order_sum" hidden>
                {{-- <input class="hidden" type="text" id="priceDB" name="price" hidden>
                <input class="hidden" type="text" id="quantityDB" name="quantity" hidden>
                <input class="hidden" type="text" id="unit_sumDB" name="unit_sum" hidden>
                <input class="hidden" type="integer" id="order_sumDB" name="order_sum" hidden>  --}}
                <div class="flex justify-between">
                    <div class="mb-6 w-3/6 mx-2">
                        <label
                            for="purchase_by"
                            class="inline-block text-lg mb-2"
                            >Anaefanya Manunuzi</label
                        >
                        <input
                            type="text"
                            class="border border-gray-600 rounded p-2 w-full"
                            name="purchase_by"
                            placeholder="Misumari nchi 4"
                            value="Admin"
                            required
                            oninvalid="this.setCustomValidity('Lazima ujaze jina la bidhaa')"
                        />
                        @error('purchase_by')
                            <p class="text-red-500 text xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6 w-3/6 mx-2">
                        <label
                            for="purchase_from"
                            class="inline-block text-lg mb-2"
                            >{{__('bought from')}}</label
                        >
                        <input
                            type="text"
                            class="border border-gray-600 rounded p-2 w-full"
                            name="purchase_from"
                            placeholder="Misumari nchi 4"
                            value="Masengo Traders"
                            required
                            oninvalid="this.setCustomValidity('Lazima ujaze jina la bidhaa')"
                        />
                        @error('purchase_from')
                            <p class="text-red-500 text xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-6 mx-2">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                        >{{__('order description')}}</label
                    >
                    <textarea
                            class="border border-gray-600 rounded p-1 w-full"
                            name="description"
                            rows="3"
                            placeholder="Maelezo kidogo kuhusu bidhaa"
                            
                    ></textarea>
                </div>
                <div class="mb-6 mx-2">
                    <label
                        for="credit"
                        class="text-lg mb-2"
                        >{{__('Not loan')}}</label
                    >
                    <input type="radio" name="credit" id="credit" value="0" checked>
                    <label
                        for="non-credit"
                        class="ml-4 text-lg mb-2"
                        >{{__('loan')}}</label
                    >
                    <input type="radio" name="credit" id="non-credit" value="1">
                </div>

                <button type="submit" class="my-2 text-white rounded py-2 px-4 bg-indigo-600 hover:bg-indigo-700">
                    {{__('Make Purchases')}}
                </button>
                <button id="clearAllOrders" type="reset" class="my-2 mx-4 text-white rounded py-2 px-4 bg-red-600 hover:bg-red-700">
                    {{__('Clear Order')}}
                </button>
            </form>
        </div>
        @vite('resources/js/purchaseProduct.js')

    
        <script>
            const editTable = document.getElementById('edit_table');
            const searchProductResults = document.getElementById('searchProductResults');
            const editArea = document.getElementById('edit_area');
            const nameInput = document.getElementById('name_input');
            const quantityInput = document.getElementById('quantity_input');
            const priceInput = document.getElementById('price_input');
            const confirmOrder = document.getElementById('confirm_order');
            const orderedItems = document.getElementById('orderedItems');
            const clearAllOrders = document.getElementById('clearAllOrders');
            
            const orderSum = document.getElementById('orderSum');

            // Vars to send to BackEnd
            let ordersDB = document.getElementById('ordersDB');
            var order_sumDB = document.getElementById('order_sumDB');
            
            
            // Declaring varibles so they can be use outside function (chooseToEdit)

            // FROM DB
            let id
            let name
            let quality
            let sellingPrice
            let availableQuantity

            // JS vars
            let id_JS
            let unit_sumJS
            let order_sumJS
            let quantity_inputJS
            let price_inputJS

            // Order conatiner
            var ordersContainer = [];
            var order_sum = 0;

            // console.log(ordersContainer);
            


            // This is the onclick function from the btns
            function chooseToEdit(e){
                    id = e.parentNode.id;
                    name = e.parentNode.childNodes[0].innerText;
                    quality = e.parentNode.childNodes[4].innerText;
                    sellingPrice = e.parentNode.childNodes[8].innerText;
                    availableQuantity = e.parentNode.childNodes[12].innerText;

                    
                    // Making the edit table to be seen
                    editTable.classList.remove('hidden')
                    // searchProductResults.classList.add('hidden')


                    // Adding name and price values to inputs
                    nameInput.value =  name + ' - ' + quality;
                    quantityInput.value = 0
                    priceInput.value = sellingPrice;

                    // console.log(priceInput.value);
            }


            confirmOrder.addEventListener('click', (e)=> {
                e.preventDefault()

                // When sending order to container, hide editarea
                editTable.classList.add('hidden')

                // Vars to be sent to container
                id_JS = parseInt(id)
                quantity_inputJS = parseInt(Math.sign(quantityInput.value) == -1 ?  -1 * quantityInput.value : quantityInput.value)
                price_inputJS = parseInt(Math.sign(priceInput.value) == -1 ?  -1 * priceInput.value : priceInput.value)
                unit_sumJS = parseInt(price_inputJS * quantity_inputJS)



                // Send data to local storage

                // Check Local Storage first to see if other items exist
                // let order = JSON.parse(localStorage.getItem('order'));

                // if (order) {
                //     order.products.push(id_JS)
                //     order.product_name.push(nameInput.value)
                //     order.quantity.push(quantity_inputJS)
                //     order.price.push(price_inputJS)
                //     order.unit_sum.push(unit_sumJS)
                //     order.order_sum = parseInt(order.order_sum) + unit_sumJS

                //     localStorage.setItem('order', JSON.stringify(order));

                // } else {
                //     let order = {
                //         products: [id_JS],
                //         product_name: [nameInput.value],
                //         quantity: [quantity_inputJS],
                //         price: [price_inputJS],
                //         unit_sum: [unit_sumJS], 
                //         order_sum: [unit_sumJS] 
                //     }

                //     // console.log(order);
                //     localStorage.setItem('order', JSON.stringify(order));
                // }



                // alternative way

                // Save data in an Orders Container

                // Check first if the currently inputed data is already in orders container


                // check variable 
                let unique = true

                for (let index = 0; index < ordersContainer.length; index++) {
                    if (ordersContainer[index].product_id == id_JS) {
                        unique = false
                    }
                }

                if (unique) {
                    ordersContainer.push({
                    product: name,
                    quality: quality,
                    quantity: quantity_inputJS,
                    price: price_inputJS,
                    unit_sum: unit_sumJS,
                    product_id: id_JS
                })

                order_sum = order_sum + unit_sumJS;
                }else{
                    alert('Hii bidhaa ushaiweka kwenye oda tayari. Kama unataka kuongeza idadi, futa kwanza iliyopo')
                }


                // Displaying items to DOM from LS

                paintUIwithOrders();


            })

            function paintUIwithOrders(){

                orderedItems.innerHTML = ''
                orderSum.innerText = ''

                ordersDB.value = ''
                order_sumDB.value = ''

                var formatedOrderSum = (order_sum).toLocaleString(
                    'en-US',
                    { minimumFractionDigits: 0 }
                    );

                orderSum.innerText = formatedOrderSum
                order_sumDB.value = order_sum


                ordersContainer.forEach(function callback (order, index) {
                    results = document.createElement('tr');

                    results.innerHTML = "<td class='pr-12 pl-4 py-2 text-center' >" + order.product + " - " + order.quality + "</td><td class='pr-12 pl-4 py-2 text-center' >" + order.quantity + "</td><td class='pr-12 pl-4 py-2 text-center' >" + order.price + "</td><td class='pr-12 pl-4 py-2 text-center' >" + order.unit_sum + "</td><td class='pr-12 pl-4 py-2 text-center' ><button onClick='deletOrderItem("+index+")' class='text-white rounded py-2 px-4 bg-red-500 hover:bg-red-600 ' >Delete</button></td>"
                    
                    orderedItems.appendChild(results)

                });

                ordersDB.value = JSON.stringify(ordersContainer);

                console.log(ordersDB.value);
            }

            function deletOrderItem(index){

                order_sum = order_sum - ordersContainer[index].unit_sum

                ordersContainer.splice(index, 1);

                console.log(ordersContainer);

                paintUIwithOrders()
            }

            clearAllOrders.addEventListener('click', () => {
                ordersContainer = []

                paintUIwithOrders();

            })

        </script>
        
</div>
    
@endsection
