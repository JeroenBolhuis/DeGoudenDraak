@extends('layouts.app')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black px-8">
        {{-- <img class="inline align-middle" src="images/restaurant-menukaart-1-2.jpg" alt="Menu 2">
        <img class="inline align-middle" src="images/restaurant-menukaart-1.jpg" alt="Menu 1"> --}}
        <div class="container mx-auto py-8">
            <div class="masonry">
                @foreach ($dishes as $type => $typeDishes)
                    <div class="mb-8 category-border masonry-item">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $type }}</h2>
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <ul>
                                @foreach ($typeDishes as $dish)
                                    <li class="flex justify-between border-b py-2">
                                        <div class="text-gray-700">
                                            <span class="font-semibold">{{ $dish->name }}</span>
                                            @if ($dish->description)
                                                <span class="text-sm text-gray-500">({{ $dish->description }})</span>
                                            @endif
                                        </div>
                                        <div class="text-gray-700">
                                            €{{ number_format($dish->price, 2) }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection