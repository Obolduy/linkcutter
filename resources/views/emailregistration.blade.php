<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <div>Подтвердите, пожалуйста, регистрацию на сайте: @php echo $_SERVER['SERVER_NAME'] @endphp</div>
    <div><a href="http://@php echo $_SERVER['SERVER_NAME'] @endphp/account/confirm_email/{{ $hash }}">Подтвердить email</a></div>
</body>
</html>