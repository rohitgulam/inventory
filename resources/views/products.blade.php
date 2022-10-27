@extends('layout')

@section('content')

    <div class="pt-24">
        <div class="w-11/12 flex flex-col items-center justify-center">
            <h2 class="text-3xl py-6" >Orodha ya bidhaa zote</h2>
            <table class="table-auto text-left border border-collapse border-gray-400">
                <thead>
                    <tr>
                        <th class="pr-12 pl-4 border border-gray-400 py-2 text-center" >#</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2" >Jina la bidhaa</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">Kategoria</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">Idadi iliyopo store</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2" >Maelezo</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2 text-center" >Vitendo</th>
                    </tr>
                </thead>
                <tbody class="text-gray-500">
                    @foreach ($products as $product)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection