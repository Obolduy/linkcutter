@section('title', 'Linkcutter - регистрация')
@section('main')
<h1>Регистрация</h1>
@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST">
    @csrf
    <div class="reg-email-input">Email: <input type="email" name="email" placeholder="Введите Ваш email" value="{{ old('email') }}" required></div>
    <div class="reg-password-input">Пароль: <input type="password" name="password" placeholder="Введите Ваш пароль" value="{{ old('password') }}" required></div>
    <div class="reg-confirm_password-input">Повторите пароль: <input type="password" name="confirm_password" placeholder="Повторите пароль" required></div>
    <div class="reg-submit-input"><input type="submit" name="submit" value="Зарегистрироваться"></div>
</form>
@endsection
@include('layout')