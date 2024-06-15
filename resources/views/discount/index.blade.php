@extends('layouts.admin2')

@section('content')
<div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg mb-4 text-gray-900 px-8 pt-8 pb-8 md-4 dark:bg-gray-800 dark:text-white">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">
            {{__('Discounts')}}
        </h1>
        <div class="flex ">
            <a href="{{ route('admin.discount.create') }}" class="text-white bg-blue-800 hover:bg-blue-600 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                {{__('Create discount')}}
            </a>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Startdatum
                </th>
                <th scope="col" class="px-6 py-3">
                    Einddatum
                </th>
                <th scope="col" class="px-6 py-3">
                    Prijnmn
                </th>
                <th scope="col" class="px-6 py-3">
                    Gerecht
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $discount->start_date }}
                </th>
                <td class="px-6 py-4">
                    {{ $discount->end_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $discount->price }}
                </td>
                <td class="px-6 py-4">
                    {{ $discount->dish_id }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    
@endsection