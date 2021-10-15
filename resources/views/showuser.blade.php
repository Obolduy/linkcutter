@section('title', 'Linkcutter - Просмотр аккаунта')
@section('main')
<h1>Мой аккаунт:</h1>
<div class="user__email">Ваш email: {{ $user->email }} @if (!$user->email_verified_at) (не подтвержден) @endif</div>
<div class="user__registrated_at">Вы зарегистрированы с: {{ $user->created_at }}</div>
<div class="user__change_email"><a href="/account/change_email">Изменить email</a></div>
<div class="user__change_password"><a href="/account/change_password">Изменить пароль</a></div>
<div class="user__show_links_link"><a href="/account/my_links">Мои ссылки</a></div>
@endsection
@include('layout')