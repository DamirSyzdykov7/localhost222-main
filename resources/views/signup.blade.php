<!DOCTYPE html>
<html>
<head>
    <title>Форма входа</title>
</head>
<body>
    <h2>РЕГИСТРАЦИЯ</h2>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
    <form method="POST" action="/register">
        @csrf
        <label for="login">Логин:</label>
        <input type="text" name="login" required><br>
        
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>
        
        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>
