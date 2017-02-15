<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#9067c6">
    <meta name="msapplication-navbutton-color" content="#9067c6">

    <!-- CSRF Token -->
    <meta id="csrfToken" name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.partials.favicon')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        html, body {
            background-color: #2c2645;
            height: 100%;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;

            flex-direction: column;

            padding: 50px 5px;
        }

        img {
            max-width: 200px;
        }

        .text {
            margin: 30px 0;
            font-size: 3em;
            color: #ffffff;

            text-align: center;
        }

        a, a:hover, a:focus {
            color: #9067c6;
        }
    </style>

    <title>Eric Jensen | Developer</title>
</head>
<body>
    <div class="container">
        <h1 class="text">Under Construction</h1>
        <img src="/img/big.png">
        <h1 class="text">
            <a href="https://github.com/Magnesium38/erjensen.net">
                GitHub Source
            </a>
        </h1>
    </div>

    @include('layouts.partials.analytics')
</body>
</html>
