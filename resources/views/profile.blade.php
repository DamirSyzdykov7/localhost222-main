<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Профиль</h1>
    @if($user)
        <p>логин: {{ $user->login }}</p>
        <p>пароль: {{ $user->password }}</p>
    @endif
        <button type="submit" class="mt-3" onclick="redirectToSmena1()">изменить</button>

<script>
function redirectToSmena1() {
    window.location.href = "/Smena1";
}
</script>
</body>
</html>
