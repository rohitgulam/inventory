@extends('layout')

@section('content')
<div class="pt-12">
    <div class="w-12/12 flex flex-col ">
        <div class="flex justify-between w-full my-6">
            <h2 class="text-3xl" >{{__('Ependiture list')}}</h2>
            
            <div>
                <a href="expense/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > Fanya Matumizi </a>
                <a href="/print-expenses?time-filter={{request()->get('time-filter')}}" class="bg-green-600 ml-2 hover:bg-green-700 text-white rounded py-3 px-4" > {{__('Print')}} </a>
            </div>
        </div>
        <div class="self-start p-2 ml-4">
            <form action="/expenses" method="get">
                <div class="mb-6">
                    <label
                        for="time-filter"
                        class="inline-block text-lg mb-2"
                    >
                        Time
                    </label>

                    @php
                        echo request()->get('time-filter');
                    @endphp
    
                    <div class="flex items-cemter justify-center">
                        <select name="time-filter" id="time-filter" class="border border-gray-600 rounded p-2 px-8 w-full">
                            <option value="today">{{__('Today')}}</option>
                            <option value="yesterday" @if (request()->get('time-filter') == 'yesterday') selected @endif >{{__('Yesterday')}}</option>
                            <option value="week" @if (request()->get('time-filter') == 'week') selected @endif >{{__('Week')}}</option>
                            <option value="month" @if (request()->get('time-filter') == 'month') selected @endif >{{__('Month')}}</option>
                            <option value="year" @if (request()->get('time-filter') == 'year') selected @endif>{{__('Year')}}</option>
                        </select>
                        @error('time-filter')
                            <p class="text-red-500 text xs mt-1">{{$message}}</p>
                        @enderror
                        <button class="mx-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-8" >Get</button>
                    </div>
                </div>
            </form>
        </div>
        <table id="datatable" class="table-auto text-left border border-collapse border-gray-400">
            <thead>
                <tr>
                    <th class="px-6 border border-gray-400 py-2 text-center" >#</th>
                    <th class="px-6 border border-gray-400 py-2" >{{__('Expense name')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Amount')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Date')}}</th> 
                    {{-- <th class="px-6 border border-gray-400 py-2" >{{__('single expense price')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('total expenses')}}</th>
                    <th class="px-6 border border-gray-400 py-2">{{__('Description')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Sold on credit')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('Buyer')}}</th>
                    <th class="px-6 border border-gray-400 py-2 text-center" >{{__('seller')}}</th>--}}
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
