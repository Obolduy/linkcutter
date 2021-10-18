@section('title', 'Linkcutter - изменить email')
@section('main')
<h1>Изменить email</h1>
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
    <div class="eml-email-input">Новый email: <input type="email" name="email" placeholder="Введите email" value="{{ old('email') }}" required></div>
    <div class="eml-password-input">Подтвердите пароль: <input type="password" name="password" placeholder="Подтвердите пароль" value="{{ old('password') }}" required></div>
    <div class="eml-submit-input"><input type="submit" name="submit" value="Изменить email"></div>
</form>
@endsection
@include('layout')