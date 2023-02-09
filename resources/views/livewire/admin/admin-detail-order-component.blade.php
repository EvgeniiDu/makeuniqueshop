<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Інформація про замовлення</h1>
                </div><!-- /.col -->
                <div>
                    <button class="btn btn-success">
                        <a href="{{ route('admin.orders') }}" style="text-decoration: none; color: #f2f4f5">Всі
                            замовлення</a>
                    </button>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Деталі замовлення
                    </div>
                    <div class="card-body">
                        <table class="table table-striped projects">
                            <tr>
                                <th>Id</th>
                                <td>{{$order->id}}</td>
                                <th>Дата замовлення</th>
                                <td>{{$order->created_at}}</td>
                                <th>Статус</th>
                                <td>{{$order->status}}</td>
                                @if($order->delivered_date)
                                    <th>Дата доставки</th>
                                    <td>{{$order->delivered_date}}</td>
                                @endif
                                @if($order->canceled_date)
                                    <th>Дата відміни</th>
                                    <td>{{$order->canceled_date}}</td>
                                @endif
                            </tr>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Замовлені товари
                    </div>
                    <div class="card-body">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 1%">
                                    Id
                                </th>
                                <th class="text-center" style="width: 15%">
                                    Фото
                                </th>
                                <th class="text-center" style="width: 10%">
                                    Найменування
                                </th>
                                <th class="text-center" style="width: 10%">
                                    Колір
                                </th>
                                <th class="text-center" style="width: 15%">
                                    Код товару
                                </th>
                                <th class="text-center" style="width: 15%">
                                    Ціна
                                </th>
                                <th class="text-center" style="width: 10%">
                                    Кількість
                                </th>
                                <th class="text-center" style="width: 20%">
                                    Сума
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td class="text-center">
                                        {{$item->product->id}}
                                    </td>
                                    <td>
                                        <img src="{{asset('assets/images/products')}}/{{$item->product->image}}"
                                             alt="" width="120">
                                    </td>
                                    <td class="text-center">
                                        <div class="title_prod">
                                            <a href="{{ route('product.details', ['prodSlug' => $item->product->slug]) }}"><span>{{ $item->product->title }}</span></a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{$item->product->color->title}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->product->SKU}}
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($item->price, 0, '', ' ') }}
                                    </td>
                                    <td class="text-center">
                                        {{$item->quantity}}
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($item->quantity * $item->price, 0, '', ' ') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="summary text-right">
                            <div class="order-summary">
                                <p class="summary-info"><span class="title"></span><b
                                        class="index">Всього: {{number_format($order->subtotal, 0, '', ' ')}} грн</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Доставка - @if($order->shipping->address) <b>адресна</b> @else<b>на відділення нової
                            пошти</b>@endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped projects">
                            <tr>
                                <th>Фамілія</th>
                                <td>{{$order->shipping->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Ім'я</th>
                                <td>{{$order->shipping->name}}</td>
                            </tr>
                            <tr>
                                <th>Телефон</th>
                                <td>{{$order->shipping->phone}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$order->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>Область</th>
                                <td>{{$order->shipping->province}}</td>
                            </tr>
                            <tr>
                                <th>Місто</th>
                                <td>{{$order->shipping->city}}</td>
                            </tr>
                            @if($order->shipping->address)
                                <tr>
                                    <th>Адреса</th>
                                    <td>{{$order->shipping->address}}</td>
                                </tr>
                            @endif
                            @if($order->shipping->department)
                                <tr>
                                    <th>Відділення нової пошти</th>
                                    <td>{{$order->shipping->department}}</td>
                                </tr>
                            @endif
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Оплата
                    </div>
                    <div class="card-body">
                        <table class="table table-striped projects">
                            <tr>
                                <th>{{$order->payment_type}}</th>
                            </tr>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
