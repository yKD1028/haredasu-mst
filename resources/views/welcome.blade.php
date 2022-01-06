<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--<link rel="icon" href="images/favicon.svg" type="image/svg+xml">-->
    <link rel="shortcut icon" href="{{ asset('/favicon.svg') }}" type="image/svg+xml">
    <title>ハレダス</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div id="app">
        <router-view/>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
