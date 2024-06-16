<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Menu</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=azeret-mono:100,400" rel="stylesheet" />

</head>
<style>
    body {
        font-family: 'Azeret Mono', monospace;
    }
    .header {
        display: flex;
        justify-content: center; /* Center the content horizontally */
        align-items: center; /* Align items vertically in the center */
        background-color: #f1f1f1;
        padding: 20px 10px;
        position: relative; /* Allow positioning of the logo */
    }

    .header .logo-container {
        position: absolute;
        left: 10px; /* Position the logo to the left */
    }

    .header h1 {
        margin: 0;
        padding-left: 10px;
    }

    .header img.logo {
        max-height: 100px;
        max-width: 100px;
        margin-right: 10px;
    }

    /* Change the background color on mouse-over */
    .header a:hover {
        background-color: #ddd;
        color: black;
    }

    /* Style the active/current link*/
    .header a.active {
        background-color: dodgerblue;
        color: white;
    }

    /* Float the link section to the right */
    .header-right {
        float: right;
    }

    .content {
            padding: 20px;
            text-align: center;
    }

    .dish-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px; /* Adjust margin as needed */
    }

    .dish-info {
        flex-grow: 1; /* This makes the .dish-info span take up remaining space */
    }

    .dish-info span {
        margin-right: 10px; /* Adjust spacing between spans */
    }

    .dish-price {
        min-width: 80px; /* Adjust as needed to ensure consistent width for price */

    }

    /* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
    @media screen and (max-width: 500px) {
        .header a {
            float: none;
            display: block;
            text-align: left;
        }
        .header-right {
            float: none;
        }
    }
</style>
<body>
    <div class="header">
        <img class="logo" src="{{ Storage::disk('public')->url('dragon-small.png')}}" alt="Golden Dragon" max-heigth=150>
        <h1>De gouden draak</h1>
    </div>
        <div class="content">
            @foreach ($dishes->groupBy('dishtype') as $type => $dishesByType)
                @if ($dishesByType->isNotEmpty())
                    <h2>{{ $type }} </h2>
                    <ul>
                        @foreach ($dishesByType as $dish)
                        <li class="dish-item">
                            <div class="dish-info">
                                <span>{{ $dish->dishnumber }} {{ $dish->addition }}</span>
                                <span>{!! $dish->name !!}</span>
                            </div>
                            <span class="dish-price">€{{ number_format($dish->price, 2) }}</span>
                        </li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
            @foreach($discounts as $discount)
            <h1>{{ $discount->start_date }}</h1>
            <ul>
                @if($discount->dishes && $discount->dishes->count() > 0)
                    @foreach($discount->dishes as $dish)
                        <li>{{ $dish->name }}</li>
                    @endforeach
                @else
                    <li>No dishes associated with this discount</li>
                @endif
            </ul>
        @endforeach
        </div>
</body>
</html>