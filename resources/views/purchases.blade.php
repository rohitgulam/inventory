@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >Orodha ya Manunuzi Yote</h2>
            
            <x-a-button  
                class="bg-indigo-600 hover:bg-indigo-700"
                name="Fanya Manunuzi"
            />
        </div>
        <table class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >Jina la bidhaa</th>
                    <th class="px-6 border border-gray-400 py-2">Kategoria</th>
                    <th class="px-6 border border-gray-400 py-2">Idadi iliyonunuliwa</th>
                    <th class="px-6 border border-gray-400 py-2" >Bei ya moja</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Bei ya jumla</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imenunuliwa kwa mkopo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imenunuliwa kutoka kwa nani</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Nani aliyefanya manunuzi</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Siku manunuzi yaliyofanyika</th>
                </tr>
            </thead>
            <tbody class="text-gray-500">
                {{-- @foreach ($products as $product)
                    <tr>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$product->name}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> 
                            @if ($product->category == null)
                                Haina Kategoria
                            @else
                            {{$product->category}}
                            @endif 
                        </td>
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
                                        name="Hariri"
                                    />
                                </form>
                                <form action="/products/{{$product->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-button 
                                        class="bg-red-500 hover:bg-red-600 mx-2" 
                                        name="Futa"
                                    />
                                    
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection