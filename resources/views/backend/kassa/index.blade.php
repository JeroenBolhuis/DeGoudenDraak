@extends('layouts.backend.kassa')

@section('content')
    <div id="app" class="flex h-[calc(100vh-8rem)]"> <!-- Adjusting for any potential header/footer -->
        <!-- Left div: List of dishes -->
        <div class="w-1/2 bg-gray-100 border-2 border-black overflow-y-scroll px-4 pt-4">
            <input class="w-1/2 text-center" type="text" id="searchInput" placeholder="Zoek op gerechtnaam of nummer...">
            @foreach($dishes->groupBy('dishtype') as $type => $dishesByType)
                @if($dishesByType->isNotEmpty()) <!-- Check if dishes exist under this type -->
                    <h2 class="text-xl font-semibold m-4">{{ $type }}</h2>
                    <ul>
                        @foreach($dishesByType as $dish)
                            <li class="dish-item flex justify-between items-center py-2 px-4 border-b border-gray-200">
                                <div class="flex flex-1">
                                    <span class="dish-number w-32">{{ $dish->dishnumber }} {{ $dish->addition }}</span>
                                    <span class="dish-name flex-1">{!! $dish->name !!}</span>
                                </div>
                                <span class="w-20 text-right">€{{ number_format($dish->price, 2) }}</span>
                                <button @click="addItemToRegister({ id: {{ $dish->id }}, name: '{{ $dish->name }}', price: {{ $dish->price }} })" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                    Voeg toe
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </div>

        <!-- Right div: Register -->
        <register-component ref="register"></register-component>
    </div>
@endsection
