@extends('layouts.app')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8 mb-1">
        <p class="text-2xl font-bold">{{ __('For years, De Gouden Draak has been known for the best take-out dishes in s-Hertogenbosch. We would like to treat you to authentic dishes from the Cantonese cuisine.') }}</p>
        <br><br>
        <p class="text-2xl font-bold underline">{{ __('Special Student Offer') }}</p>
        <br>
        <p class="text-3xl font-bold">{{ __('Chinese Rice Table (2 persons)') }}</p>
        <br>
        <p class="text-lg font-bold">{{ __('Choose 3 of the following dishes:') }}</p>
        <br>
        <div class="grid grid-cols-2 w-1/3 m-auto">
            <p class="text-lg font-bold">{{ __('Beef with Sweet and Sour Sauce') }}</p>
            <p class="text-lg font-bold">{{ __('Omelette with Sweet and Sour Sauce') }}</p> 
            <p class="text-lg font-bold">{{ __('Mixed Vegetable Dish') }}</p>
            <p class="text-lg font-bold">{{ __('Shrimp with Fried Garlic') }}</p>
            <p class="text-lg font-bold">{{ __('Barbecued Pork') }}</p>
            <p class="text-lg font-bold">{{ __('Chicken Fillet in Black Bean Sauce') }}</p>
        </div>
        <br>
        <p class="text-lg font-bold">{{ __('With white rice. (Nasi or bami for an additional charge.)') }}</p>
        <br>
        <p class="text-3xl font-bold">{{ __('Price') }}: €21.00</p>
    </div>
@endsection
