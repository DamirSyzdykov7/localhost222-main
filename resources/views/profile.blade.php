<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Профиль</h1>
    <form method="post" action="{{ route('Smena') }}">
        @csrf
    @if(isset($user))
        <p><input type="text" name="login" value="{{ $user->login }}" readonly></p>
        <p><textarea name="password"  class="form-control"readonly >{{$user->password}}</textarea></p>
    @else 
        echo "oshibea"
    @endif
    <button type="submit" class="mt-3">изменить</button>
    </form>
<h1>Добавьте данные</h1>
    <form method="post" action="{{ route('Profile') }}">
    @csrf
        <div>
            <ul>
                    <input type="hidden" name="login_id" value="{{ isset($user1) }}">
                    <input type="hidden" name="cart_id" value="{{ isset($user->cart) }}">
                    <label for="name" class="password">Имя</label>
                        <li><textarea name="name" ></textarea></li>
                    <label for="lastname" class="password">Фамилия</label>
                        <li><textarea name="lastname" ></textarea></li>
                    <label for="phone" class="password">номер телефона</label>    
                        <li><textarea name="phone" ></textarea></li>
                    <label for="adress" class="password">адресс</label>
                        <li><textarea name="adress" ></textarea></li>
                    <label for="birth_day" class="password">дата рождения</label>
                        <li><input type="date" name="birth_day" ></li>
            </ul>
            <button type="submit">добавить</button>
        </div>
    </form>
</body>
</html>