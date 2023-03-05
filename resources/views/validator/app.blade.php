<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/validator.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RIA GUESS GAME AND SCORE v1.0</title>
</head>
<body>
    <div id="notifDiv"></div>
    @yield('content')

    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    @stack('scripts')
</body>
</html>