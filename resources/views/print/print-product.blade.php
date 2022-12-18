<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products </title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
</head>
<body>
    @php
    $num = 1   

    @endphp
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th >{{__('Product Name')}}</th>
                <th>{{__('Quality')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Selling Price')}}</th>
                <th>{{__('Buying Price')}}</th>
                <th>{{__('Available Stock')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product) 
            <tr>
                <td>{{$num++}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->quality}}</td>
                <td>{{$product->category}}</td>
                <td>@money($product->selling_price)</td>
                <td>@money($product->buying_price) </td>
                <td>{{$product->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th >{{__('Product Name')}}</th>
                <th>{{__('Quality')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Selling Price')}}</th>
                <th>{{__('Buying Price')}}</th>
                <th>{{__('Available Stock')}}</th>
            </tr>
        </tfoot>

    </table>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>
</html>