<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Новий товар</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <!-- form start -->
            <form wire:submit.prevent="store">
                <div class="card-body">
                    <div class="form-group">
                        <label>Категорія</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" wire:model="category_id">
                            <option value="">Виберіть категорію</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Найменування</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"   id="exampleInputEmail1"
                               placeholder="Введіть найменування товару" wire:model="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="exampleInputEmail1"
                               placeholder="Введите название slug" wire:model="slug">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="feature_image">Фото товару</label>
                        <input class="form-control  @error('image') is-invalid @enderror" type="file" id="feature_image" name="image" accept="image/png, image/gif, image/jpeg" value="" wire:model="image">
                        @if($image)
                            <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                        @endif
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Висота</label>
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="exampleInputEmail1" placeholder="Введіть висоту"
                               wire:model="height">
                        @error('height')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Довжина</label>
                        <input type="number" class="form-control @error('length') is-invalid @enderror" id="exampleInputEmail1" placeholder="Введіть довжину"
                               wire:model="length">
                        @error('length')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ширина</label>
                        <input type="number" class="form-control @error('width') is-invalid @enderror" id="exampleInputEmail1" placeholder="Введіть ширину"
                               wire:model="width">
                    </div>
                </div>
                @if($category_id == 4)
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Наповнення матрасу</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введіть наповнення матрасу"
                               wire:model="filling">
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Покриття</label>
                        <input type="text" class="form-control @error('coating') is-invalid @enderror" id="exampleInputEmail1"
                               placeholder="Введіть тип покриття" wire:model="coating">
                        @error('coating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                @if($category_id == 1)
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Стільниця</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                               placeholder="Введіть характеристики стільниці" wire:model="tabletop">
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Матеріал</label>
                        <input type="text" class="form-control @error('material') is-invalid @enderror" id="exampleInputEmail1"
                               placeholder="Введіть характеристики стільниці" wire:model="material">
                        @error('material')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="description">Опис</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10"
                                  placeholder="Введіть опис товару" wire:model="description"></textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Колір</label>
                        <select class="form-control @error('color_id') is-invalid @enderror" wire:model="color_id">
                            <option value="">Виберіть колір</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->title}}</option>
                            @endforeach
                        </select>
                        @error('color_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Регулярна ціна</label>
                        <input type="number" class="form-control @error('regular_price') is-invalid @enderror" id="exampleInputEmail1"
                               placeholder="Введіть регулярну ціну" wire:model="regular_price">
                        @error('regular_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Знижена ціна</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"
                               placeholder="Введіть знижену ціну" wire:model="sale_price">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Код товару</label>
                        <input type="number" class="form-control @error('SKU') is-invalid @enderror" id="exampleInputEmail1"
                               placeholder="Введіть код товару" wire:model="SKU">
                        @error('SKU')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Статус запасу</label>
                        <select class="form-control" wire:model="stock_status">
                            <option value="instock">в наявності</option>
                            <option value="outofstock">немає в наявності</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Кількість</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail1"
                               placeholder="Введіть кількість залишків" wire:model="quantity">
                        @error('quantity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Топ продажу</label>
                        <select class="form-control" wire:model="top_sales">
                            <option value="0">ні</option>
                            <option value="1">так</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Новинка</label>
                        <select class="form-control" wire:model="new_product">
                            <option value="new">так</option>
                            <option value="old">ні</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="feature_image">Додаткові фото товару</label>
                        <input class="form-control @error('images') is-invalid @enderror" type="file" id="feature_image" accept="image/png, image/gif, image/jpeg"  wire:model="images" multiple>
                        <div wire:loading wire:target="images">Uploading...</div>
                        @if($images)
                            @foreach($images as $image)
                            <img src="{{ $image->temporaryUrl() }}" alt="" width="120">
                            @endforeach
                        @endif
                        @error('images')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button wire:click.prevent="store" class="btn btn-primary">Додати</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
</div>
