@section('title', 'Linkcutter - главная страница')
@section('main')
<h1>Главная страныца</h1>
<div id="message"></div>
<form id="form">
    @csrf
    <input type="text" name="link" placeholder="Введите текст ссылки" required>
    <input type="submit" value="Сгенерировать ссылку">
</form>
<script>
form.onsubmit = async (e) => {
    let url;
    
    try {
        new URL(form.elements.link.value);
    } catch (_) {
        e.preventDefault();
        alert('Введите корректный url');
        
        return false;
    }
    
    url = new URL(form.elements.link.value);
    e.preventDefault();

    let data = {
        protocol: url.protocol,
        origin: url.origin,
        host: url.host,
        hostname: url.hostname,
        pathname: url.pathname,
        href: url.href,
        search: url.search,
        hash: url.hash,
    }

    let response = await fetch('/addlink', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.elements._token.value
        },
        body: JSON.stringify(data)
    });

    if (response.ok) {
		let hashed_link = await response.text();

		form.elements.link.value = hashed_link;

        document.getElementById('message').innerHTML = 'Ссылка сгенерирована удачно!';
	}
};
</script>
@endsection
@include('layout')