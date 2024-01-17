<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>смена данных</h1>
<form method="post" action="{{ route('Smena') }}">
    @csrf
    @method('patch')
    <div class="mb-3">
            <label for="name" class="name">login</label>
            <textarea name="name"  class="form-control" required>{{$user->login}}</textarea>
        </div>
        <div class="mb-3">
            <label for="name" class="name">name</label>
            <textarea name="name"  class="form-control" required>{{$user->password}}</textarea>
        </div>
        <button>подтвердить</button>
</form>
</body>
</html>
