<!DOCTYPE html>
<html>
<head>
    <title>Форма входа</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @csrf
    <div class="card pb-4" style="width:auto; height:auto;">
        <div class="card p-5" style="width: auto">
            <div><h1>блюда</h1>
            <div style="display: grid; grid-template-columns: repeat(4, 1fr);">
                    @foreach($dishes as $dish)
                    <div class="card m-4" style="width: 18rem;">
                        <p class="card-header">{{ $dish->блюдо}}</p>
                        <img class="card-img-top" src="/public/{{ $dish->фото}}" width="300px" height="200px">
                        <p class="card-text">{{ $dish->описание}}</p>
                        <form method="POST" action="{{ route('addToCart') }}">
                            @csrf
                            <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                        <p><button type="submit">Заказать</button></p>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
            <div><h1>часто заказывают</h1>

            </div>
            <div><h1>напитки</h1>

            </div>
            <div><h1>комбо</h1>

            </div>
        </div>
    </div>

</body>
</html>