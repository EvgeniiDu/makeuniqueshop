<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Підтвердження Замовлення</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<p><b>Вітаємо, {{ $order->name }} {{ $order->lastname }} !</b></p>
<p>Ви оформили <b>замовлення № {{ $order->id }}</b> в інтернет-магазині <a href="#">MakeUnique.com.ua</a>.</p>
<p>Дякуємо за вибір! Чекайте на дзвінок менеджера для підтвердження замовлення.</p>
<p>Зверніть увагу! Замовлення не буде прийняте до обробки без підтвердження менеджером.</p>

<table class="table table-bordered" style="width: 700px; text-align: right;">
    <thead>
    <tr>
        <th scope="col">Фото</th>
        <th scope="col">Найменування</th>
        <th scope="col">Кількість</th>
        <th scope="col">Ціна</th>
        <th scope="col">Сума</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->orderItems as $item)
        <tr>
            <td><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="" width="100"></td>
            <td>{{$item->product->title}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}} грн</td>
            <td>{{$item->quantity * $item->price}} грн</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td><b>Всього: {{$order->subtotal}} грн</b></td>
    </tr>
    </tbody>
</table>

<p>Дякуємо за замовлення!</p>
</body>
</html>
