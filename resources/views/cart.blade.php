<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Корзина</h1>
@if ($cartItems->count() > 0)
            @foreach ($cartItems as $cartItem)
                <li>{{ $cartItem->блюдо }} - цена: {{ $cartItem->цена }}</li>
            @endforeach
@else
    <p>Корзина пуста.</p>
@endif
    <form action="{{ route('addToCart') }}" method="post">
    @csrf
    <button type="submit">Заказать</button>
    </form>
    <a href="{{ route('main') }}" class="btn btn-primary">Продолжить покупки</a>
</body>
</html>