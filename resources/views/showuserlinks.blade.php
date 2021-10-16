@section('title', 'Linkcutter - мои созданные ссылки')
@section('main')
<h1>Список ссылок</h1>
<table>
    <tr>
        <th>URL</th>
        <th>Сокращенная URL</th>
        <th>Количество переходов</th>
        <th>Истекает</th>
    </tr>
    @foreach ($links as $link)
    <tr>
        <td><a href="{{ $link->url }}">{{ $link->url }}</a></td>
        <td><a href="http://@php echo $_SERVER['SERVER_NAME'] @endphp/{{ $link->short_url }}">http://@php echo $_SERVER['SERVER_NAME'] @endphp/{{ $link->short_url }}</a></td>
        <td>{{ $link->redirect_count }}</td>
        <td>{{ $link->expires_at }}</td>
        <td><a onclick="deleteConfirmation()" href="/account/delete_link/{{$link->id}}">Удалить ссылку</a></td>
        @if ($link->active == 0) <td><a href="/account/update_link/{{$link->id}}">Ссылка истекла! Обновить?</a></td> @endif
    </tr>
    @endforeach
</table>
@endsection
@include('layout')
<script type="text/javascript">
    function deleteConfirmation() {
        if (confirm("Вы уверены, что хотите удалить вашу ссылку?")) {
            return true;
        } else {
            event.preventDefault();
        }
    }
</script>