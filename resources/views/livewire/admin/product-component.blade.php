@section('title', 'Всі Товари')

<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Всі товари</h1>
                </div>
                <div class="input-group mt-3 d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="form-outline" >
                            <input style="width: 200px" type="search" class="form-control" wire:model="search"/>
                        </div>
                        <button id="search-button" type="button" style="height: 38px" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="form-group d-flex ml-lg-3">
                        <select class="form-control" wire:model="category_id">
                            <option value="">Категорії</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex ml-lg-3">
                        <select class="form-control" wire:model="sorting">
                            <option value="">За замовченням</option>
                            <option value="title">найменування</option>
                            <option value="regular_price">ціна(Зростаюча)</option>
                            <option value="price-desc">ціна(Пониження)</option>
                            <option value="created_at">дата оновлення(Спочатку старі)</option>
                            <option value="created_at-desc">дата оновлення(Спочатку нові)</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-success">
                            <a href="{{ route('admin.create.product') }}" style="text-decoration: none; color: #f2f4f5">Додати
                                товар</a>
                        </button>
                    </div>
                </div>

                <!-- /.col -->
            </div><!-- /.row -->
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Успішно</strong>
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
                                Фото
                            </th>
                            <th style="width: 20%">
                                Найменування
                            </th>
                            <th style="width: 20%">
                                Категорія
                            </th>
                            <th style="width: 20%">
                                Ціна
                            </th>
                            <th style="width: 20%">
                                Дата додавання
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{$product->id}}
                                </td>
                                <td>
                                    <div class="form-group">
                                        <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt=""
                                             style="display: block; width: 120px">
                                    </div>
                                </td>
                                <td>
                                    {{$product->title}}
                                </td>
                                <td>
                                    {{$product->category['title']}}
                                </td>
                                <td>
                                    {{$product->regular_price}}
                                </td>
                                <td>
                                    {{$product->created_at}}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm"
                                       href="{{route('admin.edit.product', ['productSlug' => $product->slug])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редагувати
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <button type="submit" onclick="deleteConfirmation({{ $product->id }})" class="btn btn-danger btn-sm delete-btn">Видалити</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="paginate_container mb-4 d-flex justify-content-between">
        {{ $products->links('admin-pagination-links') }}
    </div>
</div><!-- /.container-fluid -->
<div class="modal" tabindex="-1" role="dialog" id="deleteConfirmation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Ви дійсно бажаєте видалити цей товар?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteProduct()">Видалити</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-target="#deleteConfirmation">Відміна</button>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->

@push('scripts')
    <script>
        function deleteConfirmation(id){
        @this.set('product_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteProduct(){
        @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
