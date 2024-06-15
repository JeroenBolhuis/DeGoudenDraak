@extends('layouts.app')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8">
        <form action="{{ route('restaurant.callhelp') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <div class="mb-3">
                <label for="id" class="block mb-2 text-sm font-medium text-gray-900">Tafel nummer</label>
                <input type="number" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-12 p-1"/>
                @error('id')
                <p class="text-red-500"> {{ $message }} </p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-2 text-center">Roep hulp</button>
            @if(session('success'))
                <p class="text-green-500">{{ session('success') }}</p>
            @endif
        </form>
    </div>
@endsection
