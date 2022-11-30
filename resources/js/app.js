import './bootstrap';
import 'laravel-datatables-vite';

 // Sidebar 
//  var sideBar = document.getElementById("mobile-nav");
//  var openSidebar = document.getElementById("openSideBar");
//  var closeSidebar = document.getElementById("closeSideBar");
//  sideBar.style.transform = "translateX(-260px)";

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