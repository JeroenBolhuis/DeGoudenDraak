@extends('layouts.backend.restaurant')

@section('content')

<div class="relative overflow-x-auto h-[calc(100vh-15rem)]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    nummer
                </th>
                <th scope="col" class="px-6 py-3">
                    capaciteit
                </th>
                <th scope="col" class="px-6 py-3">
                    hulp nodig
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $table )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 {{ $table->need_help ? 'bg-red-200 dark:bg-red-800'  : '' }}">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $table->number }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $table->capacity }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $table->need_help ? 'Ja' : 'Nee' }}
                    </td>
                        <td class="items-center">
                            <form action="{{ route('admin.table.resolve', $table->id) }}" method="POST">
                                @csrf
                                @if ($table->need_help)
                                <button type="submit" class="text-white bg-blue-800 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                    {{__('oplossen')}}
                                </button>
                                @endif
                            </form>
                        </td>
                    <td class="px-6 py-4 flex justify-end items-center">
                        <a href="{{ route('admin.table.show', $table->id) }}" class="text-white bg-blue-800 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            {{__('bekijk')}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
