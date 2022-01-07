<ul>
    <li>PHP: PHP 7.3</li>
    <li>Framework: Laravel 8</li>
    <li>DB: MySQL 8</li>
    <li>Server: Apache 2.4</li>
</ul>

<p>There is a "Linkcutter": pet-project in Laravel 8. The Linkcutter takes youre url and returns short (cutted) url. And if you give it a shorted url (by itself), Linkcutter will return an original url.</p>
<p>Life cycle if cutted link is 10 days for non-auth user and 30 days for auth user. After it, non-auth user`s link will switch off, and then delete. But auth-user`s link just turn off, and user can turn it on in his home page.</p>
<p>Every 20 days, if user doesn`t manipulate email or password in his account, it must be verified again by email. Durning time that it mustn`t, user can`t create new links.</p>

<p>As you can see, I used MySQL 8, but in docker-compose.yml I'm using 5.7. So because of this DB dump using only CREATE TABLE and INSERT commands.</p>

<h2>API</h2>
<p>Also you can use the API. This app using Sanctum for generating token (you need an account for this). So, via generated token you can create, delete and get your links. To create the link you should send POST-request to /api/link with you link. If everything is ok, Linkcutter will return the cutted link. If you want to see youre links, send GET-request to /api/link or /api/link/{link_id} to get a JSON with links (or link) information. And if you want to delete some link, send DELETE-request to the same URI.</p>

<h2>Run</h2>
<p>You can run this app via docker-compose up and try it on <a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a>.</p>

<p>todo:
Чуть разнообразить тестирование добавления ссылок и оформить.</p>