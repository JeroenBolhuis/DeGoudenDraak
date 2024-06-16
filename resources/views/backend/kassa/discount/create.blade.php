@extends('layouts.backend.kassa')

@section('content')
<form action="{{ route('kassa.discount.store') }}" method="POST" class="max-w-sm mx-auto">
    @error('general')
        <p class="text-red-500"> {{ $message }} </p>
    @enderror
    @csrf
    <div class="mb-5">
        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Startdatum</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('start_date')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Einddatum</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('end_date')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prijs</label>
        <input type="number" name="price" step="0.01" id="price" value="{{ old('price') }}" value="{{ old('') }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('price')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="dish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gerechttype</label>
        <select name="dish" id="dish" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($dishes as $dish)
                <option value="{{ $dish->id }}" @if (old('dish') == $dish->id) selected @endif>
                    {{ $dish->name }}
                </option>
            @endforeach
        </select>
        @error('dishtype')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
@endsection