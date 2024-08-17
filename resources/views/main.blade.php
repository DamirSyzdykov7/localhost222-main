<!DOCTYPE html>
<html>
<head>
    <title>Форма входа</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <a href="/ShowProfile"><img src="/public/doner.jpg" height="30px" weght="30px"></a>
<form method="POST" action="/main">
    @csrf
    <div class="card pb-4" style="width:auto; height:auto;">
        <p class="text-center">ЗАВЕДЕНИЯ</p>
        <div class="card mt-4" style="height:1500px; display: grid; grid-template-columns: repeat(3, 1fr); grid-auto-rows: 200px;justify-items: center;">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); grid-auto-rows: 200px; padding-bottom: 4px;grid-row-gap: 50px;grid-column-gap: 20px; justify-items: center;">
                @foreach ($organization as $item)
                <a href="/Organization?id={{$item['id']}}"><li>{{ $item->заведение }} - <img src="/public/{{ $item->photo}}" width="300px" height="200px"></li></a>
            @endforeach
            </div>
        </div>
    </div>
</form>

</body>
</html>