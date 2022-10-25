@extends('layout')

@section('content')

    <div class="pt-24">
        <div class="w-11/12 flex flex-col items-center justify-center">
            <h2 class="text-3xl py-6" >Orodha ya bizaa zote</h2>
            <table class="table-auto text-left border border-collapse border-gray-400">
                <thead>
                    <tr>
                        <th class="pr-12 border border-gray-400 py-2" >Jina la bidhaa</th>
                        <th class="pr-12 border border-gray-400 py-2">Kategoria</th>
                        <th class="pr-12 border border-gray-400 py-2">Idadi iliyopo store</th>
                        <th class="pr-12 border border-gray-400 py-2" >Maelezo</th>
                    </tr>
                </thead>
                <tbody class="text-gray-500">
                    @foreach ($products as $product)
                        <tr>
                            <td class="pr-12 border border-gray-400 py-2" > {{$product->name}}</td>
                            <td class="pr-12 border border-gray-400 py-2"> 
                                @if ($product->category == null)
                                    Haina Kategoria
                                @else
                                {{$product->category}}
                                @endif 
                            </td>
                            <td class="pr-12 border border-gray-400 py-2 text-center"> {{$product->quantity}} </td>
                            <td class="pr-12 border border-gray-400 py-2" > 
                                @if ($product->description == null)
                                    Hamna maelezo
                                @else 
                                {{$product->description}}
                                @endif 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection