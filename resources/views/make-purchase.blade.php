@extends('layout')

@section('content')

<div class="p-10 max-w-5xl mx-auto mt-16 bg-white rounded drop-shadow-2xl" >
    <h2 class="text-xl pb-2 font-bold" >Fanya Manunuzi</h2>
    <form action="/purchases" method="post">
        @csrf
        <div class="">
            <label
                for="name"
                class="inline-block text-lg mb-2"
                >Tafuta Bidhaa</label
            >
            <input
                type="text"
                id="search-product"
                class="border border-gray-600 rounded p-2 w-full"
                name="name"
                placeholder="Misumari nchi 4"
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
                    
                    <th class="pr-12 pl-4 py-2" >Jina la bidhaa</th>
                    <th class="pr-12 pl-4 py-2">Idadi</th>
                    <th class="pr-12 pl-4 py-2">Bei ya kununua</th>
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
                                <input type="number" id="price_input" class="order_input block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="2300" />
                            </div>
                        </td>
                        <td>
                            <button id="confirm_order" class="rounded py-2 px-4 bg-gray-300 text-black">
                                Ongeza
                            </button>
                        </td>
                    </tr>
            </tbody>
        </table>

        <div class="mt-40">
            <h2 class="text-2xl">Oda ya bidhaa</h2>
            <table id="edit_table" class="table-auto text-left ">
                <thead>
                    <tr>
                        
                        <th class="pr-12 pl-4 py-2" >Jina la bidhaa</th>
                        <th class="pr-12 pl-4 py-2">Idadi</th>
                        <th class="pr-12 pl-4 py-2">Bei ya kununua</th>
                        <th class="pr-12 pl-4 py-2">Jumla</th>
                    </tr>
                        
                </thead>
                <tbody id="orderedItems" class="text-gray-500">
                        {{-- <tr>
                            <td class="pr-12 pl-4 py-2 text-center" >
                                Mabati piece 100
                            </td>
                            <td class="pr-12 pl-4 py-2 text-center" > 
                                12
                            </td>
                            <td class="pr-12 pl-4 py-2 text-center" > 
                                2300
                            </td>
                            <td class="pr-12 pl-4 py-2 text-center" > 
                                230101
                            </td>
                            <td>
                                <button id="confirm_order" class="rounded py-2 px-4 bg-gray-300 text-black">
                                    Ongeza
                                </button>
                            </td>
                        </tr> --}}
                </tbody>
            </table>
            <div class="flex justify-between w-4/5 px-5 border border-0 border-t-4 my-2" >
                <span class="text-2xl font-bold" >Jumla ya oda</span>
                <span class="text-2xl font-bold" id="orderSum">0</span>
            </div>
        </div>
    

    





         
        <button class="my-2 text-white rounded py-2 px-4 bg-indigo-600 hover:bg-indigo-700">
            Fanya Manunuzi
        </button>
        <button id="clearAllOrders" class="my-2 text-white rounded py-2 px-4 bg-red-600 hover:bg-red-700">
            Futa oda yote
        </button>
    
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
            let orders;



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
            


            // This is the onclick function from the btns
            function chooseToEdit(e){
                    id = e.parentNode.id;
                    name = e.parentNode.childNodes[0].innerText;
                    quality = e.parentNode.childNodes[4].innerText;
                    sellingPrice = e.parentNode.childNodes[8].innerText;
                    availableQuantity = e.parentNode.childNodes[12].innerText;

                    // console.log(id, name, quality, sellingPrice, availableQuantity);

                    // Making the edit table to be seen
                    editTable.classList.remove('hidden')
                    // searchProductResults.classList.add('hidden')

                    // console.log(editTable);

                    // Adding name and price values to inputs
                    nameInput.value =  name + ' - ' + quality;
                    quantityInput.value = 0
                    priceInput.value = sellingPrice;

                    // console.log(priceInput.value);
            }


            confirmOrder.addEventListener('click', (e)=> {
                e.preventDefault()
                // When sending order to local storage, hide editarea
                editTable.classList.add('hidden')

                // console.log(nameInput.value);
                // console.log(priceInput.value);
                // console.log(quantityInput.value);
                
                // Vars to be sent to LS
                id_JS = parseInt(id)
                quantity_inputJS = parseInt(Math.sign(quantityInput.value) == -1 ?  -1 * quantityInput.value : quantityInput.value)
                price_inputJS = parseInt(Math.sign(priceInput.value) == -1 ?  -1 * priceInput.value : priceInput.value)
                unit_sumJS = parseInt(price_inputJS * quantity_inputJS)


                // console.log(price_inputJS);
                // console.log(quantity_inputJS);
                // console.log(unit_sumJS);

                // Send data to local storage

                // Check Local Storage first to see if other items exist
                let order = JSON.parse(localStorage.getItem('order'));

                if (order) {
                    order.products.push(id_JS)
                    order.product_name.push(nameInput.value)
                    order.quantity.push(quantity_inputJS)
                    order.price.push(price_inputJS)
                    order.unit_sum.push(unit_sumJS)
                    order.order_sum = parseInt(order.order_sum) + unit_sumJS

                    localStorage.setItem('order', JSON.stringify(order));

                } else {
                    let order = {
                        products: [id_JS],
                        product_name: [nameInput.value],
                        quantity: [quantity_inputJS],
                        price: [price_inputJS],
                        unit_sum: [unit_sumJS], 
                        order_sum: [unit_sumJS] 
                    }

                    // console.log(order);
                    localStorage.setItem('order', JSON.stringify(order));
                }

                // lsItems.products.push(3);
                // console.log(lsItems.products);

                /* 
                products: [12,23,34,45,56,67],
                quantity: [2,4, 5, 6, 1, 1],
                unit sum: [t1,t2,t3,t4,t5,t6], */

                // let order = {
                //     products: [2],
                //     quantity: [12],
                //     unit_sum: [24], 
                //     order_sum: [24] 
                // }

                // localStorage.setItem('order', JSON.stringify(order))

                // Displaying items to DOM from LS

                paintUIwithOrders();


            })

            function paintUIwithOrders(){
                orders = JSON.parse(localStorage.getItem('order'))

                orderedItems.innerHTML = ''
                orderSum.innerText = ''

                for (let index = 0; index < orders.products.length; index++) {
                    let results = document.createElement('tr')

                    // results.innerHTML = `<td class="pr-12 pl-4 py-2 text-center" >
                    //                         ${orders.product_name[index]}
                    //                     </td>
                    //                     <td class="pr-12 pl-4 py-2 text-center" >
                    //                         ${orders.quantity[index]}
                    //                     </td>
                    //                     <td class="pr-12 pl-4 py-2 text-center" >
                    //                         ${orders.price[index]}
                    //                     </td>
                    //                     <td class="pr-12 pl-4 py-2 text-center" >
                    //                         ${orders.unit_sum[index]}
                    //                     </td>
                    //                     <td class="pr-12 pl-4 py-2 text-center" >
                    //                         <button onClick='deletOrderItem(index)' class='text-white rounded py-2 px-4 bg-red-500 hover:bg-red-600 ' >Delete</button>
                    //                     </td>
                                        
                    //                     `
                    results.innerHTML = "<td class='pr-12 pl-4 py-2 text-center' >" + orders.product_name[index] + "</td><td class='pr-12 pl-4 py-2 text-center' >" + orders.quantity[index] + "</td><td class='pr-12 pl-4 py-2 text-center' >" + orders.price[index] + "</td><td class='pr-12 pl-4 py-2 text-center' >" + orders.unit_sum[index] + "</td><td class='pr-12 pl-4 py-2 text-center' ><button onClick='deletOrderItem("+index+")' class='text-white rounded py-2 px-4 bg-red-500 hover:bg-red-600 ' >Delete</button></td>"

                    orderSum.innerText = orders.order_sum

                    orderedItems.appendChild(results)
                    
                }
            }

            function deletOrderItem(index){
                orders.order_sum = parseInt(orders.order_sum) - orders.unit_sum[index]
                orders.products.splice(index, 1);
                orders.product_name.splice(index, 1);
                orders.quantity.splice(index, 1);
                orders.price.splice(index, 1);
                orders.unit_sum.splice(index, 1);

                localStorage.setItem('order', JSON.stringify(orders));

                paintUIwithOrders()

                
            }

            clearAllOrders.addEventListener('click', () => {
                localStorage.removeItem('order');

                paintUIwithOrders();

            })

        </script>
        
</div>
    
@endsection
