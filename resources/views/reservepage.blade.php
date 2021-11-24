<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>予約画面</title>
</head>
<body>
<h1>TOPnav予定地</h1>
<div id="reserve">
    <reserve-page></reserve-page>
</div>

<script src="{{ asset('/js/app.js') }}" defer></script>
</body>
</html>
