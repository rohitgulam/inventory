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
                    {{-- <th class="px-6 border border-gray-400 py-2">Kategoria</th> --}}
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
                @foreach ($purchases as $purchase)
                    <tr>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$purchase->product}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->quantity}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->price}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$purchase->unit_sum}} </td>
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
                        {{-- <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                            @if ($purchase->description == null)
                                Hamna maelezo
                            @else 
                            {{$purchase->description}}
                            @endif 
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection