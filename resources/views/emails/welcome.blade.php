<!DOCTYPE html>
<html>
<head>
    <title>Добро пожаловать!</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .button { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Привет, {{ $user->name ?? 'Пользователь' }}!</h1>
        <p>Спасибо за регистрацию в {{ config('app.name') }}!</p>
        <p>Ваш email: {{ $user->email }}.</p>

        @if (!$user->hasVerifiedEmail())
            <p>Пожалуйста, подтвердите ваш email, чтобы получить полный доступ:</p>
            <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->email)]) }}" class="button">Подтвердить Email</a>
        @endif

        <p>Если у вас есть вопросы, пишите на <a href="mailto:support@example.com">support@example.com</a>.</p>
        <p>С уважением,<br>{{ config('app.name') }}</p>
    </div>
</body>
</html>