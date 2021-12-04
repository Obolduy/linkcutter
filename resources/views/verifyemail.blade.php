@section('title', 'Linkcutter - подтверждение Email')
@section('main')
<h1>Письмо с подтверждением email успешно отправлено на Ваш электронный ящик: {{ Auth::user()->email }}</h1>
<p><a href="/">Вернуться на главную</a></p>
@endsection
@include('layout')