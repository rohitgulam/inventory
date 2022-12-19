@extends('layout')

@php
 $num = 1   
@endphp

@section('content')
<div class="w-2/2  flex items-between justify-center">
    <div class="w-full px-12">
        <p class="text-3xl font-bold">Income</p>
        {{-- @php
            var_dump($items[0]);
        @endphp --}}
        <p class="font-bold text-xl">Products</p>
        @foreach ($items[0] as $item)
            <ul>
                <li class="flex w-5/12 justify-between">
                    <span>
                        {{$item->product}} x {{$item->quantity}}
                    </span>  
                    <span>
                        @money($item->unit_sum)
                    </span> 
                    
                </li>
            </ul>
            
        @endforeach
        <p class="font-bold text-xl">Transport</p>
        @foreach ($items[1] as $item)
            <ul>
                <li class="flex w-5/12 justify-between">
                    <span>
                        {{$item->name}} 
                    </span>  
                    <span>
                        @money($item->amount)
                    </span> 
                    
                </li>
            </ul>
            
        @endforeach
        <div class="flex w-5/12 justify-between font-bold">
            <p>Total</p>
            @foreach ($items[2] as $item)
                        @money($item->revenue)
                    
                    
            @endforeach
        </div>
    </div>
    <div class="w-full px-12">
        <p class="text-3xl font-bold">Expenses</p>
        <p class="font-bold text-xl">Bought Products</p>
        @foreach ($items[3] as $item)
            <ul>
                <li class="flex w-5/12 justify-between">
                    <span>
                        {{$item->product}} x {{$item->quantity}}
                    </span>  
                    <span>
                        @money($item->unit_sum)
                    </span> 
                    
                </li>
            </ul>
            
        @endforeach
        <p class="font-bold text-xl">Expenses</p>
        @foreach ($items[4] as $item)
            <ul>
                <li class="flex w-5/12 justify-between">
                    <span>
                        {{$item->name}} 
                    </span>  
                    <span>
                        @money($item->amount)
                    </span> 
                    
                </li>
            </ul>
            
        @endforeach
        <div class="flex w-5/12 justify-between font-bold">
            <p>Total</p>
            @foreach ($items[2] as $item)
                        @money($item->expenses)
            @endforeach
        </div>
    </div>
</div>
@endsection
