@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col ">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >Orodha ya Matumizi Yote</h2>
            
            <a href="expense/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > Fanya Matumizi </a>
        </div>
        <table class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >Jina la bidhaa</th>
                    <th class="px-6 border border-gray-400 py-2">Jumla ya deni</th>
                    <th class="px-6 border border-gray-400 py-2" >Pesa iliyolipwa</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Pesa iliyobaki</th> 
                    <th class="px-6 border border-gray-400 py-2">Mhusika</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Siku</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" ></th>
                    {{-- <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa mkopo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa nani</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Nani aliyefanya mauzo</th>--}}
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
                                    Deni Limelipwa
                                </p>
                            @else
                            <form action="/sells/{{$product->id}}/edit" method="GET">
                                @csrf
                                <x-button 
                                    class="bg-green-600 hover:bg-green-700 mx-2"
                                    name="Lipa Deni"
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