@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col ">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >Akaunti za kila siku{{__('daily accounts')}}</h2>
        </div>
        <table class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >Siku{{__('day')}}</th>
                    <th class="px-6 border border-gray-400 py-2">Mapato {{__('income')}}</th>
                    <th class="px-6 border border-gray-400 py-2" >Matumizi{{__('enpenditures')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Faida{{__('profit')}}</th> 
                    <th class="px-6 border border-gray-400 py-2 text-center" >Hasara{{__('loss')}}</th> 
                    {{-- <th class="px-6 border border-gray-400 py-2">Mhusika{{__('user')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Siku{{__('day')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" ></th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa mkopo{{__('sold on credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Imeuzwa kwa nani{{__('sold to')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >Nani aliyefanya mauzo{{__('seller')}}</th>--}}
                </tr>
            </thead>
            <tbody class="text-gray-500">
                @foreach ($accounts as $account)
                    <tr>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$account->created_at}}</td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> @money($account->revenue) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-red-500"> @money($account->expenses) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-green-500"> @money($account->profit) </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2 text-red-500"> @money($account->loss) </td>
                        {{-- <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$account->sell_to}} </td>
                        <td class="pr-12 pl-4 border border-gray-400 py-2"> {{$account->created_at}} </td> 
                        <td class="pr-12 pl-4 border border-gray-400 py-2">
                            @if ($account->credit == 0)
                                <p class="text-lg text-green-500">
                                    Deni Limelipwa
                                </p>
                            @else
                            <form action="/sells/{{$account->id}}/edit" method="GET">
                                @csrf
                                <x-button 
                                    class="bg-green-600 hover:bg-green-700 mx-2"
                                    name="Lipa Deni"
                                />
                            </form> 
                            @endif
                        </td>
                        <td>
                            {{$account->credit}}</td> 
                        <td class="pr-12 pl-4 border border-gray-400 py-2" > 
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
