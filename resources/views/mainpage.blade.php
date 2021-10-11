<p>Главная страныца</p>
<form action="/addlink">
    @csrf
    <input type="text" name="link" placeholder="Введите текст ссылки">
    <input type="submit" value="Сгенерировать ссылку">
</form>