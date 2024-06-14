@extends('layouts.app')

@section('content')
    <div class="text-center bg-gray-100 border-2 border-black py-8">
        <h1 class="font-serif font-bold">{{__('Welcome to')}} {{ __('The Golden Dragon')}}</h1>
        <p>{{ __('The Golden Dragon')}} {{ __('is easy to find, close to the centrum, 5 minutes walk distance from the central station.') }}</p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2473.432987711052!2d5.284448915590253!3d51.68852110526529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6ee8855f3c5d1%3A0x4c4797f27d227e73!2sOnderwijsboulevard%20215%2C%205223%20DE%20's-Hertogenbosch!5e0!3m2!1sen!2snl!4v1585055473064!5m2!1sen!2snl" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
@endsection