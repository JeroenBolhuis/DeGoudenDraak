@extends('layouts.backend.admin')

@section('content')

<form action="{{ route('admin.table.store') }}" method="POST" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
        <input type="text" name="number" id="number" value="{{ old('number') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('number')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capaciteit</label>
        <input type="text" name="capacity" id="capacity" value="{{ old('capacity') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('capacity')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
@endsection