@extends('layout')

@php
 $num = 1   
@endphp

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >{{__('purchase list')}}</h2>
            
            <a href="sell/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > Fanya Mauzo </a>
        </div>
        <table id="print-table" class="display">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('product name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('quantity sold')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('each price')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('wholesale price')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('description')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('sold on credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('sold to')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('seller')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('purchase day')}}</th>
                </tr>
            </thead>
            <tbody class="text-gray-500">
                @foreach ($sells as $sell)
                        <tr>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$num++}}</td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$sell->product}}</td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->quantity}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($sell->price) </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($sell->unit_sum) </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                                @if ($sell->description === null)
                                    Hamna maelezo
                                @else 
                                    {{$sell->description}}
                                @endif 
                            </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center">
                                @if ($sell->credit == 1)
                                    Mkopo
                                @else 
                                    Sio Mkopo
                                @endif 
                            </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_to}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_by}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->created_at}} </td>
                            
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
    $('#print-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>
@endsection
