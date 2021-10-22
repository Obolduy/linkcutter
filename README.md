<ul>
    <li>PHP: PHP 7.3</li>
    <li>Framework: Laravel 8</li>
    <li>DB: MySQL 8</li>
    <li>Server: Apache 2.4</li>
</ul>

<p>There is a "Linkcutter": pet-project in Laravel 8. The Linkcutter takes youre url and returns short (cutted) url. And if you give it a shorted url (by itself), Linkcutter will return an original url.</p>
<p>Life cycle if cutted link is 10 days for non-auth user and 30 days for auth user. After it, non-auth user`s link will switch off, and then delete. But auth-user`s link just turn off, and user can turn it on in his home page.</p>
<p>Every 20 days, if user doesn`t manipulate email or password in his account, it must be verified again by email. Durning time that it mustn`t, user can`t create new links.</p>

todo:
Чуть разнообразить тестирование добавления ссылок и оформить.