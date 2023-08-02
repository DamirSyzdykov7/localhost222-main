<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Корзина</h1>
    @if ($cartItems->isEmpty())
        <p>Корзина пуста.</p>
    @else
        <ul>
            @foreach ($cartItems as $dishId => $item)
                <li>{{ $item['name'] }} - Количество: {{ $item['quantity'] }}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{ route('dishes') }}" class="btn btn-primary">Продолжить покупки</a>
</body>
</html