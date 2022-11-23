@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col items-center justify-center">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >Orodha ya Mauzo Yote</h2>
            
            <a href="sell/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > Fanya Mauzo </a>
        </div>
        <table class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >Jina la bidhaa</th>
                    <th class="px-6 border border-gray-400 py-2">Idadi iliyouzwa</th>
                    <th class="px-6 border border-gray-400 py-2" >Bei ya moja</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Bei ya jumla</th>
                    <th class="px-6 border border-gray-400 py-2">Maelezo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa mkopo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa nani</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Nani aliyefanya mauzo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Siku mauzo yaliyofanyika</th>
                </tr>
            </thead>
            <tbody class="text-gray-500">
                @foreach ($sells as $sell)
                    <tr>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$sell->product}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->quantity}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($sell->price) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($sell->unit_sum) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                            @if ($sell->description === null)
                                Hamna maelezo
                            @else 
                                {{$sell->description}}
                            @endif 
                        </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center">
                            @if ($sell->credit == 1)
                                Mkopo
                            @else 
                                Sio Mkopo
                            @endif 
                        </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_to}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_by}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->created_at}} </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection