@extends('layouts.backend.admin')

@section('content')
    <div class="bg-gray-100 flex justify-center space-x-8 h-[calc(100vh-8rem)]">
        <div class="border-2 border-black py-8 my-8 p-4 w-1/4 h-3/4">
            <div id="app">
                <revenuecalculator></revenuecalculator>
            </div>
        </div>
        <div class="border-2 border-black py-8 my-8 p-4 w-1/4 h-3/4 overflow-y-scroll">
            <h2 class="font-bold text-xl mb-4">Dagelijke verkoop overzichten</h2>
            <ul>
                @php
                    // Sort files by date
                    $sortedFiles = collect($files)->sortByDesc(function ($file) {
                        return filemtime(storage_path('app/public/summaries/' . basename($file)));
                    });
                @endphp
                @foreach ($sortedFiles as $file)
                    <li>
                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ url('backend/admin/summaries/' . basename($file)) }}">{{ basename($file) }}</a>
                    </li>
                @endforeach
            <ul>
        </div>
    </div>
@endsection
