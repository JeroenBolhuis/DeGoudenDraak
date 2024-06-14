@extends('layouts.admin2')

@section('content')
<div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg mb-4 text-gray-900 px-8 pt-8 pb-8 md-4">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">
            {{__('Gerechten')}}
        </h1>
        <div class="flex ">
            <a href="{{ route('dish.create') }}" class="text-white bg-blue-800 hover:bg-blue-600 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                {{__('Gerecht aanmaken')}}
            </a>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    menunummer
                </th>
                <th scope="col" class="px-6 py-3">
                    toevoeging
                </th>
                <th scope="col" class="px-6 py-3">
                    naam
                </th>
                <th scope="col" class="px-6 py-3">
                    prijs
                </th>
                <th scope="col" class="px-6 py-3">
                    gerechttype
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $dish->dishnumber }}
                </th>
                <td class="px-6 py-4">
                    {{ $dish->addition }}
                </td>
                <td class="px-6 py-4">
                    {{ $dish->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $dish->price }}
                </td>
                <td class="px-4 py-4">
                    {{ $dish->dishtype }}
                </td>
                <td class="px-6 py-4 flex justify-end items-center">
                    <a href="{{ route('dish.edit', $dish->id) }}" class="text-white bg-blue-800 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        {{__('edit')}}
                    </a>
                    <form action="{{ route('dish.destroy', $dish->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            {{__('delete')}}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    
@endsection