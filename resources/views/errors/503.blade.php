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
            max-width: 300px;
        }

        .text {
            margin: 40px;
            font-size: 5em;
            color: #ffffff;
        }
    </style>

    <title>My title</title>
</head>
<body>
    <div class="container">
        <h1 class="text">Under</h1>
        <img src="/img/big.png">
        <h1 class="text">Construction</h1>
    </div>
</body>
</html>
