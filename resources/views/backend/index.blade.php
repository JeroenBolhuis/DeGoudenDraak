@extends('layouts.backend')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8 mb-1">
        <p class="text-2xl font-bold">Welkom {{Auth::user()->name}}</p>
    </div>
@endsection