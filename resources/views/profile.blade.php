<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Профиль</h1>
    <form method="post" action="Smena">
        @csrf
    @if($user)
        <p><input type="text" name="login" value="{{ $user->login }}" readonly></p>
        <p><textarea name="password"  class="form-control"readonly >{{$user->password}}</textarea></p>
    @else 
        echo "oshibea"
    @endif
    <button type="submit" class="mt-3">изменить</button>

</form>

</body>
</html>