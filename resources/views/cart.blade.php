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
                <li>{{ $item['блюдо'] }} - Количество: {{ $item['quantity'] }} - цена: {{ $item['цена']}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('AddToCard') }}" method="post">
    @csrf
    <button type="submit">Заказать</button>
    </form>
    <a href="{{ route('addToCart') }}" class="btn btn-primary">Продолжить покупки</a>
</body>
</html>