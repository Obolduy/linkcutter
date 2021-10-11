<p>Главная страныца</p>
<form id="form">
    @csrf
    <input type="text" name="link" placeholder="Введите текст ссылки">
    <input type="submit" value="Сгенерировать ссылку">
</form>
<script>
    form.onsubmit = async (e) => {
    let url = new URL(form.elements.link.value);
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
};
</script>