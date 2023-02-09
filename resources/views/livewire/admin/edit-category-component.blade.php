<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування категорії</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <!-- form start -->
            <form wire:submit.prevent="updateCategory">
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
                        <input type="text" name="title" class="form-control @error('slug') is-invalid @enderror"   id="exampleInputEmail1"
                               placeholder="Введіть найменування товару" wire:model="slug">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button wire:click.prevent="updateCategory" class="btn btn-primary">Оновити</button>
                </div>
            </form>
        </div>
    </section>
</div>

