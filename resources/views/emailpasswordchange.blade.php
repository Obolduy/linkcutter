<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <div>На Ваш email с сайта @php echo $_SERVER['SERVER_NAME'] @endphp было отправлен запрос на изменение пароля</div>
    <div><a href="http://@php echo $_SERVER['SERVER_NAME'] @endphp/account/change_password/{{ $hash }}">Подтвердить смену пароля</a></div>
</body>
</html>