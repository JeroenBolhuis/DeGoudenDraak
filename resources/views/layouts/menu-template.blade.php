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
        max-width: 1200px;
        margin: 0 auto;
        padding: 1.5em;
    }

    .menu {
        font-family: sans-serif;
        font-size: 14px;
    }

    .menu-group-heading {
        margin: 0;
        padding-bottom: 1em;
        border-bottom: 2px solid #ccc;
    }

    .menu-group {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5em;
        padding: 1.5em 0;
    }

    .menu-item {
        display: flex;
    }

    .menu-item-img {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        object-fit: cover;
        margin-right: 1.5em;
    }

    .menu-item-text {
        flex-grow: 1;
    }

    .menu-item-heading {
        display: flex;
        justify-content: space-between;
        margin: 0;
    }

    .menu-item-name {
        margin-right: 1.5em;
    }

    .menu-item-desc {
        line-height: 1.6;
    }

    @media screen and (min-width: 992px) {
        .menu {
            font-size: 16px;
        }

        .menu-group {
            grid-template-columns: repeat(2, 1fr);
        }

        .menu-item-img {
            width: 125px;
            height: 125px;
        }
    }
</style>
<body>
    <div class="header">
        <img class="logo" src="{{ Storage::disk('public')->url('dragon-small.png')}}" alt="Golden Dragon" max-heigth=150>
        <h1>De gouden draak</h1>
    </div>
    <div class="content">
        <div class="menu">
            @foreach ($dishes->groupBy('dishtype') as $type => $dishesByType)
                @if ($dishesByType->isNotEmpty())
                    <h2 class="menu-group-heading">{{ $type }}</h2>
                    <div class="menu-group">
                        @foreach ($dishesByType as $dish)
                        <div class="menu-item">
                            <div class="menu-item-text">
                                <h3 class="menu-item-heading">
                                    <span class="menu-item-name">{!! $dish->name !!}</span>
                                    <span class="menu-item-price">€{{ number_format($dish->price, 2) }}
                                </h3>
                                <p class="menu-item-desc">
                                    {{ $dish->description }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>	
                @endif
            @endforeach
            <h1>discounts</h1>
            @foreach ($discounts as $discount)
            <div>
                <strong>{!!$discount->dish->name!!}</strong> {{ __('For only')}} <strong>€{{$discount->price}}</strong> ({{$discount->start_date}} {{ __('Through')}} {{$discount->end_date}})
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>