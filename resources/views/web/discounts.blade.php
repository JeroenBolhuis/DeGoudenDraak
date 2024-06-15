@extends('layouts.app')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8">
        <h1 class="font-serif font-bold text-2xl">{{__('Special discounts')}}</h1>
        @foreach ($discounts as $discount)
            <div>
            <strong>{{!!$discount->dish->name!!}}</strong> {{ __('For only')}} <strong>€{{$discount->price}}</strong> ({{$discount->start_date}} {{ __('Through')}} {{$discount->end_date}})
            </div>
        @endforeach
    </div>
@endsection