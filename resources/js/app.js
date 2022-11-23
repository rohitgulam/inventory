import './bootstrap';
 // Sidebar 
 var sideBar = document.getElementById("mobile-nav");
 var openSidebar = document.getElementById("openSideBar");
 var closeSidebar = document.getElementById("closeSideBar");
 sideBar.style.transform = "translateX(-260px)";

 function sidebarHandler(flag) {
     if (flag) {
         sideBar.style.transform = "translateX(0px)";
         openSidebar.classList.add("hidden");
         closeSidebar.classList.remove("hidden");
     } else {
         sideBar.style.transform = "translateX(-260px)";
         closeSidebar.classList.add("hidden");
         openSidebar.classList.remove("hidden");
     }
 }

 // Add Product Form
 const addProductForm = document.getElementById('add-product-form');
 const addProductBtn = document.getElementById('nav-add-product-button');
 const closeProductBtn = document.getElementById('close-product-button');

 addProductBtn.addEventListener('click', function(){
     addProductForm.classList.toggle('hidden')
 })

 closeProductBtn.addEventListener('click', function(){
     addProductForm.classList.toggle('hidden')
 })

//  Add Expense Form
const addExpenseForm = document.getElementById('add-expense-form');
const addExpenseBtn = document.getElementById('add-expense-button');
const closeExpenseBtn = document.getElementById('close-expense-button');

addExpenseBtn.addEventListener('click', function(){
    addExpenseForm.classList.toggle('hidden')
})

closeExpenseBtn.addEventListener('click', function(){
    addExpenseForm.classList.toggle('hidden')
})

 // Search Product 
 const searchProductInput = document.getElementById('search-product');
 const searchResults = document.getElementById('searchProductResults');


 searchProductInput.addEventListener('keyup', (e) => {
     let searchQuery = e.target.value;

     axios.post('/searchproduct', {
         token: '{{ csrf_token() }}',
         searchQuery : searchQuery
     })
     .then( (res) => {

         let searchRes = res

             
         if (searchQuery == '') {
             searchResults.classList.add('hidden');
         }else{
             let results = '';

             searchResults.innerHTML = results;
             searchResults.classList.remove('hidden');
             
             res.data.forEach((value) => {

                 let results = document.createElement('div')
                 
                 results.innerHTML = "<div id='"+ value.id +"' class='flex max-w- my-1' ><span class='mx-2 py-2 w-64 text-center' >" + value.name + "</span> <span class='py-2' >|</span> <span class='mx-2 py-2 w-32 text-center' >" + value.quality + "</span> <span class='py-2' >|</span> <span class='mx-2 py-2 w-32 text-center' >" + value.selling_price + "</span> <span class='py-2' >|</span> <span class='mx-2 py-2 w-32 text-center' >" + value.quantity + "</span> <button onClick='chooseToEdit(this)' class='selectProductBtn py-2 cursor-pointer'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-plus-square'><rect x='3' y='3' width='18' height='18' rx='2' ry='2'></rect><line x1='12' y1='8' x2='12' y2='16'></line><line x1='8' y1='12' x2='16' y2='12'></line></svg></button> </div><hr class='border border-gray-100'>"
                             
                 searchResults.appendChild(results);

                var buttons = document.querySelectorAll('.selectProductBtn');
                
                buttons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                     })
                });
             });
             
         }
     } )
     .catch( err => console.log('ERROR', err) )
 })





 
