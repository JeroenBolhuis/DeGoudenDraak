<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>De gouden draak</title>

        @vite(['resources/js/app.js'])
        @vite(['resources/css/app.css'])
		
    </head>
	<body class="px-4 py-2 bg-darker-red">
		<table id="main_table" class="p-5 w-full border-collapse">
			<tbody>
				<tr class="h-12 bg-normal-red">
					<td class="text-center w-3/10 text-yellow-500 text-3xl">
                        @include('partials.logo')
					</td>
					<td>
						<a href="{{ route('discounts') }}" class="text-yellow-500 font-bold no-underline">
							<marquee behavior="scroll" direction="left">
								{{__('Welcome to')}} {{__('The Golden Dragon')}} @if (Auth::check()) {{ Auth::user()->name }} @endif. {{__('Click this text to see the discounts of this week!')}}
							</marquee>
						</a>
					</td>
					<td class="text-center w-3/10 text-yellow-500 text-3xl">
                        @include('partials.logo')
					</td>
				</tr>
				<!-- CONTENT HERE -->
			</tbody>
		</table>
		<table id="main_table" class="p-5 w-full border-collapse">
			<tbody>
				<tr class="h-7 bg-normal-red">
					<td colspan="9"></td>
				</tr>
				<tr></tr>
				<tr class="h-5 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-t-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-t-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-b-4 border-yellow-500"></td>
					<td class="border-t-4 border-yellow-500 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-l-4 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-l-4 border-t-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-t-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-b-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-r-4 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5"></td>
					<td></td>
					<td class="w-5"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-b-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-10 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-r-4 border-yellow-500 border-l-4 border-yellow-500"></td>
					<td class="w-5"></td>
					<td class="w-5"></td>
					<td class="text-center">
						<table class="w-full">
							<tbody>
                                <tr>
                                    <td colspan="3">
                                        <div>
                                            <div class="mb-4">
                                                <img src="images/dragon-small.png" class="float-left h-44" alt="Golden Dragon"> 
                                                <img src="images/dragon-small-flipped.png" class="float-right h-44" alt="Golden Dragon"> 
                                                <p class="text-4xl font-serif font-bold text-yellow-500">{{__('Chinese Indian Specialties')}}</p>
                                                <p class="text-5xl font-serif font-bold text-yellow-500">{{__('The Golden Dragon')}}</p>
                                            </div>
											<form method="post" action="{{ route('setLocale') }}">
												@csrf
												<button type="submit" name="locale" value="en">English</button>
												<button type="submit" name="locale" value="nl">Nederlands</button>
											</form>
                                            <div class="max-w-xl mx-auto"> <!-- Set maximum width and center the div -->
                                                <div class="flex px-1 py-2 border border-gray-500">
                                                    <a href="{{ route('menu') }}" class="flex-grow btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 rounded">
														{{__('Menu')}}
                                                    </a>
                                                    <a href="{{ route('restaurant') }}" class="flex-grow btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 ml-3 rounded">
														{{__('Restaurant')}}
                                                    </a>
                                                    <a href="{{ route('news') }}" class="flex-grow btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 rounded mx-3">
														{{__('News')}}
                                                    </a>
                                                    <a href="{{ route('contact') }}" class="flex-grow btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 rounded">
														{{__('Contact')}}
                                                    </a>
													@if (Auth::check())
                                                    <a href="{{ route('backend') }}" class="flex-grow btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 rounded ml-3">
														{{__('Backend')}}
                                                    </a>
													@endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-20 px-20">
                                            @yield('content')
                                        </div>
                                    </td>
                                </tr>
							</tbody>
						</table>
						<div class="text-center font-serif"><a href="{{ route('contact') }}" class="text-yellow-500">{{__('To')}} Contact</a></div>
					</td>
					<td class="w-5"></td>
					<td class="w-5"></td>
					<td class="w-5 border-r-4 border-yellow-500 border-l-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-r-4 border-yellow-500 border-t-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5"></td>
					<td></td>
					<td class="w-5"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-t-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-t-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-t-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-normal-red">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-yellow-500"></td>
					<td class="border-t-4 border-yellow-500 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-l-4 border-yellow-500"></td>
					<td class="w-5 border-l-4 border-b-4 border-yellow-500"></td>
					<td class="w-5 border-r-4 border-b-4 border-yellow-500"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-7 bg-normal-red">
					<td colspan="9"></td>
				</tr>
			</tbody>
		</table>
	</body>

</html>
