<!DOCTYPE html>
<html>
<head>
    <title>Подтверждение Email</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; text-align: center; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .button { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Подтвердите ваш Email</h1>
        <p>Мы отправили письмо с ссылкой для подтверждения на ваш email.</p>
        <p>Пожалуйста, проверьте вашу почту и перейдите по ссылке.</p>

        @if (session('status') == 'verification-link-sent')
            <p style="color: green;">Новое письмо отправлено!</p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <p>Не получили письмо?</p>
            <button type="submit" class="button">Отправить повторно</button>
        </form>

        <p><a href="{{ route('logout') }}">Выйти</a></p>
    </div>
</body>
</html>