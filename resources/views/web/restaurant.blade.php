@extends('layouts.app')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8">
        <form action="{{ route('restaurant.callhelp') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <div class="mb-1 flex justify-center items-center"> <!-- Added flex utilities -->
                <label for="id" class="block mb-2 mx-2 text-sm font-medium text-gray-900">{{__('Table number')}}</label>
                <input type="number" name="id" id="id" class="mx-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-12 p-1"/>
            </div>                
            @error('id')
                <p class="text-red-500"> {{ __($message) }} </p>
            @enderror
            <button type="submit" class="mt-1 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-2.5 text-center">{{__('Call help')}}</button>
            @if(session('success'))
                <p class="text-green-500">{{ session('success') }}</p>
            @endif
        </form>
    </div>
@endsection
