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
                <th >{{__('Name')}}</th>
                <th>{{__('Amount')}}</th>
                <th>{{__('Issued By')}}</th> 
                <th>{{__('Date')}}</th> 
            </tr>
        </thead>
        <tbody class="text-gray-500">
            @foreach ($transports as $transport)
                <tr>
                    <td> {{$loop->iteration}}</td>
                    <td > {{$transport->name}}</td>
                    <td> @money($transport->amount) </td>
                    <td> {{$transport->issued_by}} </td> 
                    <td> {{$transport->created_at}} </td> 
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th >{{__('Name')}}</th>
                <th>{{__('Amount')}}</th>
                <th>{{__('Issued By')}}</th> 
                <th>{{__('Date')}}</th> 
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