@section('title', 'Linkcutter - сброс пароля')
@section('main')
<h1>Сброс пароля</h1>
<form method="POST" id="form">
    @csrf
    Введите Ваш email, с помощью которого Вы регистрировались на сайте: <input type="email" name="email" placeholder="Email" required>
    <input type="submit" name="submit" value="Сбросить пароль">
</form>
<div id="error__message"></div>
<script>
form.onsubmit = async (e) => {    
    let email = form.elements.email.value;

    e.preventDefault();

    let response = await fetch('/account/forget_password/email_check', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.elements._token.value
        },
        body: email
    });

    if (response.ok) {
		let json = await response.json();

        if (json['error']) {
            document.getElementById('error__message').innerHTML = json['error'];
        } else {
            window.location.href="/account/forget_password/success";
        }
	}
};
</script>
@endsection
@include('layout')