<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/js/app.js'])
        @vite('resources/css/app.css')
    </head>
	<body class="px-4 py-2 bg-darker-red">
		<table id="main_table" class="p-5 w-full border-collapse">
			<tbody>
				<tr class="h-12 bg-normal-red">
					<td class="text-center w-3/10 text-yellow-500 text-3xl">
						<img class="inline align-middle h-12" src="images/dragon-small.png" alt="Golden Dragon">
						<span class="font-chinese_takeaway">De Gouden Draak</span>
						<img class="inline align-middle h-12 transform flip" src="images/dragon-small-flipped.png" alt="Golden Dragon">
					</td>
					<td>
						<a href="paginas/aanbiedingen.html" class="text-yellow-500 font-bold no-underline">
							<marquee behavior="scroll" direction="left">
								Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
							</marquee>
						</a>
					</td>
					<td class="text-center w-3/10 text-yellow-500 text-3xl">
						<img class="inline align-middle h-12" src="images/dragon-small.png" alt="Golden Dragon">
						<span class="font-chinese_takeaway">De Gouden Draak</span>
						<img class="inline align-middle h-12 transform flip" src="images/dragon-small-flipped.png" alt="Golden Dragon">
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
                                                <p class="text-4xl font-bold text-yellow-500">Chinees Indische Specialiteiten</p>
                                                <p class="text-5xl font-bold text-yellow-500">De Gouden Draak</p>
                                            </div>
                                            <table class="mx-auto">
                                                <a href="{{ route('menu') }}" class="btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 px-6 rounded mx-1">
                                                    Menukaart
                                                </a>
                                                <a href="{{ route('news') }}" class="btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 px-6 rounded mx-1">
                                                    Nieuws
                                                </a>
                                                <a href="{{ route('contact') }}" class="btn text-white bg-gradient-to-b from-blue-300 to-blue-900 py-1 px-6 rounded mx-1">
                                                    Contact
                                                </a>
                                            </table>
                                        </div>
                                        <div class="mt-20 px-20">
                                            @yield('content')
                                        </div>
                                    </td>
                                </tr>
							</tbody>
						</table>
						<div class="text-center"><a href="{{ route('contact') }}" class="text-yellow-500">Naar Contact</a></div>
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
