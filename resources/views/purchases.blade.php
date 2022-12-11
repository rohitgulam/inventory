@extends('layout')

@php
 $num = 1   
@endphp

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >{{__('purchase list')}}</h2>
            
            <x-a-button  
                class="bg-indigo-600 hover:bg-indigo-700"
                name="{{__('Make a Purchase')}}"
            />
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
                    <th class="px-6 border border-gray-400 py-2" >{{__('product name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('purchased quantity')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('price for each')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('wholesale price')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('description')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('bought on credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('bought from')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('buyer')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('purchase day')}}</th>
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
