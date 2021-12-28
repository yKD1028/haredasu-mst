<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mail</title>
</head>

<body>
  <p>テスト送信</p>
  <p>{{$email}}</p>
  <form action="/hon_regist" method="POST">
    @csrf
    <input type="text" name="email" value="{{$email}}">
    <button type="submit">本登録</button>
  </form>
</body>

</html>