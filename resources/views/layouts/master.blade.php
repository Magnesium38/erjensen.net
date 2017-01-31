<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="csrfToken" name="csrf-token" content="{{ csrf_token() }}">

    <title>My title</title>
</head>
<body>
    @yield('content')
</body>
</html>
