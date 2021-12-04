<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        @auth
            <a href="/account">Аккаунт</a>
            <a href="/logout">Выйти</a>
        @endauth
        @guest
            <a href="/registration">Регистрация</a>
            <a href="/login">Войти</a>
        @endguest
    </header>
    @yield('main')
</body>
</html>