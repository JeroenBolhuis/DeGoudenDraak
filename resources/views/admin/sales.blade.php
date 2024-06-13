@extends('layouts.admin')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8 mb-1">
        <div id="app">
            <revenuecalculator></revenuecalculator>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </div>
    hi
    {{$revenue}}
    @foreach ($sales as $s)
        {{$s}}
    @endforeach
@endsection