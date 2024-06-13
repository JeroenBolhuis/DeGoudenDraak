<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>De gouden draak</title>

        @vite(['resources/js/app.js'])
        @vite(['resources/css/app.css'])
		@stack('scripts')
    </head>
	<body class="px-4 py-2 bg-zinc-300">
		<table id="main_table" class="p-5 w-full border-collapse">
			<tbody>
				<tr class="h-7 bg-white">
					<td colspan="9">
						<div>
							<div class="max-w-xl mx-auto"> <!-- Set maximum width and center the div -->
								<div class="flex px-1 pt-2 pb-4">
									<a href="{{ route('admin.kassa') }}" class="flex-grow btn text-white bg-blue-300 py-1 border border-blue-900 rounded-lg text-center">
										Kassa
									</a>
									<a href="{{ route('admin.menu') }}" class="flex-grow btn text-white bg-blue-300 py-1 border border-blue-900 rounded-lg text-center mx-3">
										Gerechten
									</a>
									<a href="{{ route('admin.sales') }}" class="flex-grow btn text-white bg-blue-300 py-1 border border-blue-900 rounded-lg text-center">
										Verkoop Overzicht
									</a>
									@if (Auth::check())
									<a href="{{ route('home') }}" class="flex-grow btn text-white bg-blue-300 py-1 border border-blue-900 rounded-lg text-center ml-3">
										Website
									</a>
									@endif
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr></tr>
				<tr class="h-5 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-t-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-t-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-b-4 border-blue-800"></td>
					<td class="border-t-4 border-blue-800 border-b-4 border-blue-800"></td>
					<td class="w-5 border-l-4 border-b-4 border-blue-800"></td>
					<td class="w-5 border-l-4 border-t-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-t-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-b-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-b-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-r-4 border-b-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5"></td>
					<td></td>
					<td class="w-5"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-b-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-10 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-r-4 border-blue-800 border-l-4 border-blue-800"></td>
					<td class="w-5"></td>
					<td class="w-5"></td>
					<td class="text-center">
						<table class="w-full">
							<tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="px-20">
                                            @yield('content')
                                        </div>
                                    </td>
                                </tr>
							</tbody>
						</table>
					</td>
					<td class="w-5"></td>
					<td class="w-5"></td>
					<td class="w-5 border-r-4 border-blue-800 border-l-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-r-4 border-blue-800 border-t-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5"></td>
					<td></td>
					<td class="w-5"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-t-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-t-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-t-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-5 bg-white">
					<td class="w-7"></td>
					<td class="w-5 border-l-4 border-b-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-b-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-blue-800"></td>
					<td class="border-t-4 border-blue-800 border-b-4 border-blue-800"></td>
					<td class="w-5 border-l-4 border-blue-800"></td>
					<td class="w-5 border-l-4 border-b-4 border-blue-800"></td>
					<td class="w-5 border-r-4 border-b-4 border-blue-800"></td>
					<td class="w-7"></td>
				</tr>
				<tr class="h-7 bg-white">
					<td colspan="9"></td>
				</tr>
			</tbody>
		</table>
	</body>

</html>
