@section('title', 'Linkcutter - сброс пароля')
@section('main')
<h1>Сброс пароля</h1>
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
    <div class="pas-password-input">Пароль: <input type="password" name="password" placeholder="Введите Ваш пароль" value="{{ old('password') }}" required></div>
    <div class="pas-confirm_password-input">Повторите пароль: <input type="password" name="confirm_password" placeholder="Повторите пароль" required></div>
    <div class="pas-submit-input"><input type="submit" name="submit" value="Изменить пароль"></div>
</form>
@endsection
@include('layout')