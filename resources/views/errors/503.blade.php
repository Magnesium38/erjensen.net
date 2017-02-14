<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="csrfToken" name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        html, body {
            background-color: #2C2645;
            height: 100%;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;

            flex-direction: column;
        }

        img {
            max-width: 200px;
        }

        .text {
            margin-top: 40px;
            margin-bottom: 0;
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
        <img src="/img/big.png">
        <h1 class="text">Under Construction</h1>
        <h1 class="text">
            <a href="https://github.com/Magnesium38/erjensen.net">
                GitHub Source
            </a>
        </h1>
    </div>
</body>
</html>
