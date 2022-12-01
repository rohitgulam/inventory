@extends('layout')

@php
 $num = 1   
@endphp

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >Orodha ya Manunuzi Yote{{__('purchase list')}}</h2>
            
            <x-a-button  
                class="bg-indigo-600 hover:bg-indigo-700"
                name="Fanya Manunuzi"
            />
        </div>
        <table id="datatable" class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >Jina la bidhaa{{__('product name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">Idadi iliyonunuliwa{{__('purchased quantity')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >Bei ya moja{{__('price for each')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Bei ya jumla{{__('wholesale price')}}</th>
                    <th class="px-6 border border-gray-400 py-2">Maelezo{{__('description')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imenunuliwa kwa mkopo{{__('bought on credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imenunuliwa kutoka kwa nani{{__('bought from')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Nani aliyefanya manunuzi{{__('buyer')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Siku manunuzi yaliyofanyika{{__('purchase day')}}</th>
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
