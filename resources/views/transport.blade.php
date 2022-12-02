@extends('layout')

@section('content')

    <div class="pt-24">
        <div class="w-11/12 flex flex-col justify-center">
            <div class="grid grid-cols-2 mb-4">
                <h2 class="text-3xl py-6" >{{__('All Transports')}}</h2>
                <a href="transport/create" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded py-3 px-4" > {{__('Make Transport')}} </a>
            </div>
            <table id="datatable" class="table-auto text-left border border-collapse border-gray-400">
                <thead>
                    <tr>
                        <th class="pr-12 pl-4 border border-gray-400 py-2 text-center" >#</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2" >{{__('Name')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Amount')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Issued By')}}</th>
                        <th class="pr-12 pl-4 border border-gray-400 py-2">{{__('Day')}}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-500">
                    @foreach ($transports as $transport)
                        <tr>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center" > {{$loop->iteration}}</td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2" > {{$transport->name}}</td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center"> @money($transport->amount) </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center"> {{$transport->issued_by}} </td>
                            <td class="pr-12 pl-4 border border-gray-400 py-2 text-center"> {{$transport->created_at}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @vite('resources/js/table.js')

@endsection