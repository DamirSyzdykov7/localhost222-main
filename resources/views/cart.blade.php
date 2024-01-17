<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
</head>
<body>
<h1>Корзина</h1>
@if ($cartItems->count() > 0)
    <ul>
        @php
            $totalPrice = 0; //переменная для общей цены
        @endphp

        @foreach ($cartItems as $cartItem)
            <li>{{ $cartItem->блюдо }} - цена: {{ (int)$cartItem->цена }}</li>
            @php
                $totalPrice += (int)$cartItem->цена; // Увеличение общей цены
            @endphp
        @endforeach
    </ul>
    <p>Общая цена: {{ $totalPrice }}</p>
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
