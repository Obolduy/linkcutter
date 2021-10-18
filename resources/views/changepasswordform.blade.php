@section('title', 'Linkcutter - новый пароль')
@section('main')
<h1>Изменить пароль</h1>
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
    <div class="chg-password-input">Пароль: <input type="password" name="password" placeholder="Введите Ваш пароль" value="{{ old('password') }}" required></div>
    <div class="chg-new_password-input">Новый пароль: <input type="password" name="new_password" placeholder="Введите новый пароль" value="{{ old('new_password') }}" required></div>
    <div class="chg-confirm_password-input">Повторите пароль: <input type="password" name="confirm_password" placeholder="Повторите пароль" required></div>
    <div class="chg-submit-input"><input type="submit" name="submit" value="Изменить пароль"></div>
</form>
@endsection
@include('layout')