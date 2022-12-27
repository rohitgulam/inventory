@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col ">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >{{__('List of all credits')}}</h2>
            
            {{-- <a href="expense/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > Fanya Matumizi </a> --}}
        </div>
        <table class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Product Name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Total Debt')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Paid Amount')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Balance')}}</th> 
                    <th class="px-6 border border-gray-400 py-2">{{__('User')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Day')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" ></th>
                    {{-- <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Sold on credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Buyer')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Seller')}}</th>--}}
                </tr>
            </thead>
            <tbody class="text-gray-500">
                @foreach ($products as $product)
                    <tr>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$product->product}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($product->unit_sum) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-green-500"> @money($product->paid_amount) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-red-500"> @money($product->unit_sum - $product->paid_amount ) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$product->sell_to}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$product->created_at}} </td> 
                        <td class="pr-12 pl-4 border border-gray-400 py-2">
                            @if ($product->credit == 0)
                                <p class="text-lg text-green-500">
                                    {{__('Credit Paid')}}
                                </p>
                            @else
                            <form action="/credit/{{$product->id}}/edit" method="GET">
                                @csrf
                                <x-button 
                                    class="bg-green-600 hover:bg-green-700 mx-2"
                                    name="Pay"
                                />
                            </form> 
                            @endif
                        </td>
                        <td>
                            {{$product->credit}}</td> 
                        {{-- <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                            @if ($product->description === null)
                                Hamna maelezo
                            @else 
                                {{$product->description}}
                            @endif 
                        </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center">
                            @if ($product->credit == 1)
                                Mkopo
                            @else 
                                Sio Mkopo
                            @endif 
                        </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_to}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_by}} </td>
                         --}}
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
