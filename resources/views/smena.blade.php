<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
@section("content")
<h1>смена данных</h1>
<form method="post" action="{{ route('Smena') }}">
    @csrf
    @method('patch')
    <div class="mb-3">
            <label for="login" class="name">login</label>
            <textarea name="login"  class="form-control" required>{{$user->login}}</textarea>
        </div>
        <div class="mb-3">
            <label for="password" class="password">name</label>
            <textarea name="password"  class="form-control" required>{{$user->password}}</textarea>
        </div>
        <button>подтвердить</button>
</form>
@stop
</body>
</html>
