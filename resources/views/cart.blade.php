<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Корзина</h1>
@if ($cartItems)
    @foreach ($cartItems as $dishId => $item)
        <li>{{ $item['блюдо'] }} - цена: {{ $item['цена']}}</li>
    @endforeach
@else
    <p>Корзина пуста.</p>
@endif
    <form action="{{ route('addToCart') }}" method="post">
    @csrf
    <button type="submit">Заказать</button>
    </form>
    <a href="{{ route('addToCart') }}" class="btn btn-primary">Продолжить покупки</a>
</body>
</html>