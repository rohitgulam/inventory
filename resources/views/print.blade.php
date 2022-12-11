<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sells for @php echo date('Y-m-d') @endphp </title>
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
                <th>Product Name</th>
                <th>Product Quality</th>
                <th>Price per unit</th>
                <th>Total Price</th>
                <th>Sold by</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sells as $sell) 
            <tr>
                <td>{{$num++}}</td>
                <td>{{$sell->product}}</td>
                <td>{{$sell->quantity}}</td>
                <td>@money($sell->price)</td>
                <td>@money($sell->unit_sum) </td>
                <td>{{$sell->sell_by}}</td>
                <td>{{$sell->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Purchased Quantity</th>
                <th>Price per unit</th>
                <th>Total Price</th>
                <th>Salary</th>
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