@extends('layouts.admin2')

@section('content')
<form action="{{ route('dish.update', $dish) }}" method="POST" class="max-w-sm mx-auto">
    @csrf
    @method('PUT')
    <div class="mb-5">
        <label for="dishnumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gerechtnummer</label>
        <input type="text" name="dishnumber" id="dishnumber" value="{{ $dish->dishnumber }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('dishnumber')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="addition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Toevoeging</label>
        <input type="text" name="addition" id="addition" value="{{ $dish->addition }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('addition')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naam</label>
        <input type="text" name="name" id="name" value="{{ $dish->name }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('name')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prijs</label>
        <input type="number" name="price" step="0.01" id="price" value="{{ $dish->price }}" value="{{ $dish->price }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        @error('price')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beschrijving</label>
        <textarea name="description" id="desctiption" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $dish->description }}
        </textarea>
        @error('description')
            <p class="text-red-500"> {{ $message }} </p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="dishtype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gerechttype</label>
        <select name="dishtype" id="dishtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($dishtypes as $dishtype)
                <option value="{{ $dishtype->type }}" @if (old('dishtype', $dish->dishtype) == $dishtype->type) selected @endif>
                    {{ $dishtype->type }}
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