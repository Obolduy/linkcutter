@section('title', 'Linkcutter - Просмотр аккаунта')
@section('main')
<h1>Мой аккаунт:</h1>
<div class="user__email">Ваш email: {{ Auth::user()->email }} @if (!Auth::user()->email_verified_at) (не подтвержден) @elseif (date('Y-m-d', strtotime(Auth::user()->updated_at . "+20 days")) < date('Y-m-d', time())) Пожалуйста, подтвердите повторно Ваш Email @endif</div>
<div class="user__registrated_at">Вы зарегистрированы с: {{ Auth::user()->created_at }}</div>
<div class="user__change_email"><a href="/account/change_email">Изменить email</a></div>
<div class="user__change_password"><a href="/account/change_password">Изменить пароль</a></div>
<div class="user__show_links_link"><a href="/account/my_links">Мои ссылки</a></div>
<div class="user__show_main"><a href="/">На главную</a></div>
@endsection
@include('layout')