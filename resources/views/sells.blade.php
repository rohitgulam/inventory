@extends('layout')

@php
 $num = 1   
@endphp

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >{{__('Sells List')}}</h2>
            
            <div>
                <a href="sell/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > {{__('Make a Sell')}} </a>
                <a href="/print?time-filter={{request()->get('time-filter')}}" class="bg-green-600 ml-2 hover:bg-green-700 text-white rounded py-3 px-4" > {{__('Print')}} </a>
            </div>
        </div>
        <div class="self-start p-2 ml-4">
            <form action="/sells" method="get">
                <div class="mb-6">
                    <label
                        for="time-filter"
                        class="inline-block text-lg mb-2"
                    >
                        Time
                    </label>

                    @php
                        echo request()->get('time-filter');
                    @endphp
    
                    <div class="flex items-cemter justify-center">
                        <select name="time-filter" id="time-filter" class="border border-gray-600 rounded p-2 px-8 w-full">
                            <option value="today">{{__('Today')}}</option>
                            <option value="yesterday" @if (request()->get('time-filter') == 'yesterday') selected @endif >{{__('Yesterday')}}</option>
                            <option value="week" @if (request()->get('time-filter') == 'week') selected @endif >{{__('Week')}}</option>
                            <option value="month" @if (request()->get('time-filter') == 'month') selected @endif >{{__('Month')}}</option>
                            <option value="year" @if (request()->get('time-filter') == 'year') selected @endif>{{__('Year')}}</option>
                        </select>
                        @error('time-filter')
                            <p class="text-red-500 text xs mt-1">{{$message}}</p>
                        @enderror
                        <button class="mx-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-8" >Get</button>
                    </div>
                </div>
            </form>
        </div>
        <table id="print-table" class="display">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Product Name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Quantity sold')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Single Price')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Total Price')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Description')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Sold To')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Seller')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Day')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Actions')}}</th>
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
                            <td class="pr-12 pl-4 border border-gray-400 py-2">
                                <div class="flex">
                                    <form action="/sells/{{$sell->id}}/edit" method="get">
                                    @csrf
                                    @method('GET')
                                    <button class="text-white rounded py-2 px-4 bg-blue-600 hover:bg-blue-700 mx-2" >
                                        {{__('Edit')}}
                                    </button>
                                </form>
                                <form action="/sells/{{$sell->id}}/delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-white rounded py-2 px-4 bg-red-500 hover:bg-red-600 mx-2" >
                                        {{__('Delete')}}
                                    </button>
                                </form>
                                 </div>
                            </td>
                            
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
