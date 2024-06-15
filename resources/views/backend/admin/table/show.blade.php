@extends('layouts.backend.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-5">Tafel details</h2>
    <div class="mb-5">
        <p class="text-sm font-medium text-gray-900">Tafel Nummer: {{ $table->number }}</p>
        <p class="text-sm font-medium text-gray-900">Capaciteit: {{ $table->capacity }}</p>
        <p class="text-sm font-medium text-gray-900">Heeft hulp nodig: {{ $table->need_help ? 'Ja' : 'Nee' }}</p>
    </div>

    <h3 class="text-xl font-semibold mb-3">Boekingen</h3>
    <div class="overflow-x-auto max-h-screen mb-5">
        <div class="flex space-x-4">
            @foreach ($bookings as $booking)
            <div class="flex-shrink-0 w-96 bg-gray-100 rounded-lg p-3">
                <p class="text-xl font-bold">{{ $booking->datetime }}</p>
                <p>Deluxe menu: {{ $booking->deluxe_menu ? 'Ja' : 'Nee' }}</p>>
                <h4 class="text-lg font-semibold mt-2">Guests</h4>
                @foreach ($booking->customers as $customer)
                <div class="mb-2 flex">
                    <p class="inline-block mr-2">Naam: {{ $customer->name }},</p>
                    <p class="inline-block">Leeftijd: {{ $customer->age }}</p>
                    <form action="{{ route('admin.customer.destroy', $customer->id) }}" method="POST" class="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-2 text-center">Verwijder gast</button>
                    </form>
                </div>
                @endforeach
                @if ($booking->customers->count() < $table->capacity)
                <form action="{{ route('admin.booking.addCustomer', $booking->id) }}" method="POST">
                    @csrf
                    <div class="my-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1"/>
                        @error('name')
                        <p class="text-red-500"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                        <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1"/>
                        @error('age')
                        <p class="text-red-500"> {{ $message }} </p>
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1 text-center">Voeg gast toe</button>
                </form>
                @endif
                <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1 text-center">Verwijder boeking</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <h3 class="text-xl font-semibold mb-3">Voeg boeking toe</h3>
    <form action="{{ route('admin.table.addBooking', $table->id) }}" method="POST" class="max-w-sm">
        @csrf
        <div class="mb-5">
            <label for="datetime" class="block mb-2 text-sm font-medium text-gray-900">Datetime</label>
            <input type="datetime-local" name="datetime" id="datetime" value="{{ old('datetime') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
            @error('datetime')
            <p class="text-red-500"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="deluxe_menu" class="block mb-2 text-sm font-medium text-gray-900">Deluxe Menu</label>
            <input type="checkbox" name="deluxe_menu" id="deluxe_menu" value="1" class="form-checkbox h-5 w-5 text-blue-600">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add Booking</button>
    </form>
    <form action="{{ route('restaurant.index') }}" method="GET" class="mt-5">
        <button type="submit" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Exit Table</button>
    </form>
</div>
@endsection
