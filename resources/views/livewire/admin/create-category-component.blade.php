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
                        <label for="exampleInputEmail1">Найменування</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"   id="exampleInputEmail1"
                               placeholder="Введіть найменування категорії" wire:model="title">
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
                        <input type="text" name="title" class="form-control @error('slug') is-invalid @enderror"   id="exampleInputEmail1"
                               placeholder="Введіть slug категорії" wire:model="slug">
                        @error('slug')
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
