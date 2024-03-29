@section('title', 'Linkcutter - вход')
@section('main')
<h1>Вход в систему</h1>
@if ($errors->any())
    <div class="errors">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
<form method="POST">
    @csrf
    <div class="login-email-input">Email: <input type="email" name="email" placeholder="Введите Ваш email" value="{{ old('email') }}" required></div>
    <div class="login-password-input">Пароль: <input type="password" name="password" placeholder="Введите Ваш пароль" value="{{ old('password') }}" required></div>
    <div class="login-remember_token-input"><input type="checkbox" name="remember_token" value="1"> Запомнить меня</div>
    <div class="login-submit-input"><input type="submit" name="submit" value="Войти"></div>
</form>
<div><a href="/account/forget_password">Забыли пароль?</a></div>
@endsection
@include('layout')