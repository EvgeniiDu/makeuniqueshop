<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Новий колір</h1>
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
                        <label for="exampleInputEmail1">Найменування</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"   id="exampleInputEmail1"
                               placeholder="Введіть найменування кольору" wire:model="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="feature_image">Фото кольору</label>
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
                <div class="card-footer">
                    <button wire:click.prevent="store" class="btn btn-primary">Додати</button>
                </div>
            </form>
        </div>
    </section>
</div>
