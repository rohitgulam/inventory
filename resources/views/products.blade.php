@extends('layout')

@section('content')

    <div class="pt-24">
        <div class="w-11/12 flex flex-col items-center justify-center">
            <div class=" w-11/12 flex items-center justify-between">
            <h2 class="text-3xl py-6" >{{__('product list')}}</h2>
                <a href="/print-products" class="bg-green-600 ml-2 hover:bg-green-700 text-white rounded py-3 px-4" > {{__('Print')}} </a>
            </div>
            <table id="datatable" class="table-auto text-left border border-collapse border-gray-400">
                <thead>
                    <tr>
                        <th class="pr-12 pl-4 border border-gray-400 py-2 text-center" >#</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2" >{{__('Product Name')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Quality')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Category')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Selling Price')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Buying Price')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Available Stock')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2" >{{__('Description')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2 text-center" >{{__('action')}}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-500">
                    @foreach ($products as $product)
                            <tr>
                                <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$product->name}}</td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$product->quality}}</td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2"> 
                                    @if ($product->category == null)
                                        Haina Kategoria
                                    @else
                                    {{$product->category}}
                                    @endif 
                                </td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2 text-center"> @money($product->selling_price) </td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2 text-center"> @money($product->buying_price) </td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2 text-center"> {{$product->quantity}} </td>
                                <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                                    @if ($product->description == null)
                                        Hamna maelezo
                                    @else 
                                    {{$product->description}}
                                    @endif 
                                </td>
                                <td class="px-6 border border-gray-400 py-1">  
                                    <div class="flex">
                                        <form action="/products/{{$product->id}}/edit" method="GET">
                                            @csrf
                                            <x-button 
                                                class="bg-blue-600 hover:bg-blue-700 mx-2"
                                                name="{{__('Edit')}}"
                                            />
                                        </form>
                                        <form action="/products/{{$product->id}}/delete" method="post">
                                            @csrf
                                            @method('PUT')
                                            <x-button 
                                                class="bg-red-500 hover:bg-red-600 mx-2" 
                                                name="{{__('Delete')}}"
                                            />
                                            
                                        </form>

                                        {{-- @unless ($product->bonus !== 1)
                                        <form action="/products/bonus/{{$product->id}}/edit" method="post">
                                            @csrf
                                            @method('PUT')
                                            <x-button 
                                                class="bg-slate-500 hover:bg-slate-600 mx-2" 
                                                name="Weka Bonus"
                                            />
                                            
                                        </form>
                                        @endunless --}}

                                    </div>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @vite('resources/js/table.js')

@endsection
