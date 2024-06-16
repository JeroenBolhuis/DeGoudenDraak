<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Rekening</title>
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

        .table {
            border-collapse: collapse;
            margin: 0 auto; /* Center the table */
            width: 80%; /* Adjust width as needed */
        }

        .table th, .table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
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

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>€{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>€{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>{{ $item['comment'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">
                <strong>Total Price: €9000</strong>
            </div>

        </div>
</body>
</html>