<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Всі замовлення</h1>
                    <div class="mt-3 d-flex">
                        <div class="form-outline">
                            <input id="search-input" type="number" id="form1" class="form-control" wire:model="search"/>
                        </div>
                        <button id="search-button" type="button" style="height: 38px" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                Id
                            </th>
                            <th style="width: 20%">
                                Сума
                            </th>
                            <th style="width: 20%">
                                Фамілія
                            </th>
                            <th style="width: 20%">
                                Ім'я
                            </th>
                            <th style="width: 20%">
                                Телефон
                            </th>
                            <th style="width: 20%">
                                Email
                            </th>
                            <th style="width: 20%">
                                Статус
                            </th>
                            <th style="width: 20%">
                                Оплата
                            </th>
                            <th style="width: 20%">
                                Дата замовлення
                            </th>
                            <th style="width: 20%" colspan="2 text-center">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}
                                </td>
                                <td>
                                    {{$order->subtotal}}
                                </td>
                                <td>
                                    {{$order->lastname}}
                                </td>
                                <td>
                                    {{$order->name}}
                                </td>
                                <td>
                                    {{$order->phone}}
                                </td>
                                <td>
                                    {{$order->email}}
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>
                                    {{$order->payment_type}}
                                </td>
                                <td>
                                    {{$order->created_at}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Статус
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                            <a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}}, '{{'доставлено'}}')">Доставлено</a>
                                            <a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}}, '{{'відмінено'}}')">Відмінено</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm"
                                       href="{{route('admin.order.detail', ['order_id' => $order->id])}}">
                                        Детально
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="paginate_container mb-4 d-flex justify-content-between">
        {{ $orders->links('admin-pagination-links') }}
    </div>
</div>


