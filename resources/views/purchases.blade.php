@extends('layout')

@php
 $num = 1   
@endphp

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >{{__('Purchases')}}</h2>
            
            <div>
                <x-a-button  
                class="bg-indigo-600 hover:bg-indigo-700"
                name="{{__('Make a Purchase')}}"
                />
                <a href="/print-purchases?time-filter={{request()->get('time-filter')}}" class="bg-green-600 ml-2 hover:bg-green-700 text-white rounded py-3 px-4" > {{__('Print')}} </a>
            </div>
        </div>
        <div class="self-start p-2 ml-4">
            <form action="/purchases" method="get">
                <div class="mb-6">
                    <label
                        for="time-filter"
                        class="inline-block text-lg mb-2"
                    >
                        Time
                    </label>
    
                    <div class="flex items-cemter justify-center">
                        <select name="time-filter" id="time-filter" class="border border-gray-600 rounded p-2 px-8 w-full">
                            <option value="today">{{__('Today')}}</option>
                            <option value="yesterday">{{__('Yesterday')}}</option>
                            <option value="week">{{__('Week')}}</option>
                            <option value="month">{{__('Month')}}</option>
                            <option value="year">{{__('Year')}}</option>
                        </select>
                        @error('time-filter')
                            <p class="text-red-500 text xs mt-1">{{$message}}</p>
                        @enderror
                        <button class="mx-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-8" >Get</button>
                    </div>
                </div>
            </form>
        </div>
        <table id="datatable" class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Product Name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Purchased Quantity')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Price For Each')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Total Price')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Description')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Credit?')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Bought From')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Bought By')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Purchase Day')}}</th>
                </tr>
            </thead>
            <tbody class="text-gray-500">
                @foreach ($purchases as $purchase)
                    @unless ($purchase->credit == 1)
                        <tr>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$num++}}</td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$purchase->product}}</td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->quantity}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($purchase->price) </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($purchase->unit_sum) </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                                @if ($purchase->description == null)
                                    Hamna maelezo
                                @else 
                                {{$purchase->description}}
                                @endif 
                            </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center">
                                @if ($purchase->credit == 1)
                                Mkopo
                                @else 
                                Sio Mkopo
                                @endif 
                            </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->purchase_from}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->purchase_by}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->created_at}} </td>
                        </tr>
                    @endunless 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@vite('resources/js/table.js')

    {{-- <script>
        // $(document).ready( function () {
        //     $('#the-table').DataTable();
        // } );

        console.log(jQuery());
    </script> --}}
@endsection
