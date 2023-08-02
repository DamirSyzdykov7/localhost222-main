<!DOCTYPE html>
<html>
<head>
    <title>Форма входа</title>
</head>
<body>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <h2>Вход</h2>
    <form method="POST" action="/login">
        @csrf
        <label for="login">Логин:</label>
        <input type="text" name="login" required><br>
        
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Войти</button>
        <h2 class="mt-3">если нету логина ,то зарегестрируйтесь</h2>

        <button type="submit" class="mt-3" onclick="redirectToRegister()">Зарегистрироваться</button>

        <script>
        function redirectToRegister() {
            window.location.href = "/register";
        }

        function redirectToMain() {
            window.location.href = "/main";
        }
    </script>
    </form>
</body>
</html>
