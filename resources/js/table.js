import './bootstrap';
import jquery from 'jquery';
window.$ = jquery;

$(document).ready( function () {
    $('#datatable').DataTable();
} );