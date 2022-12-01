@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col ">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >Orodha ya Matumizi Yote</h2>
            
            <a href="expense/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > Fanya Matumizi </a>
        </div>
        <table id="datatable" class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >Jina la matumizi</th>
                    <th class="px-6 border border-gray-400 py-2">Jumla</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Siku matumizi yaliyofanyika</th> 
                    {{-- <th class="px-6 border border-gray-400 py-2" >Bei ya moja</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Bei ya jumla</th>
                    <th class="px-6 border border-gray-400 py-2">Maelezo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa mkopo</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa nani</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Nani aliyefanya mauzo</th>--}}
                </tr>
            </thead>
            <tbody class="text-gray-500">
                @foreach ($expenditure as $expense)
                    <tr>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$expense->name}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($expense->amount) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$expense->created_at}} </td> 
                        {{-- <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$expense->quantity}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($expense->unit_sum) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > 
                            @if ($expense->description === null)
                                Hamna maelezo
                            @else 
                                {{$expense->description}}
                            @endif 
                        </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center">
                            @if ($expense->credit == 1)
                                Mkopo
                            @else 
                                Sio Mkopo
                            @endif 
                        </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_to}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$sell->sell_by}} </td>--}}
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@vite('resources/js/table.js')
@endsection