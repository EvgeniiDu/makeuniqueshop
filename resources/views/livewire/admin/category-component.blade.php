<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Всі категорії</h1>
                </div><!-- /.col -->
                <div>
                    <button class="btn btn-success">
                        <a href="{{ route('admin.create.categories') }}" style="text-decoration: none; color: #f2f4f5">Додати
                            категорію</a>
                    </button>
                </div>
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
                                Найменування
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td>
                                    {{$category->title}}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm"
                                       href="{{route('admin.edit.category', ['categorySlug' => $category->slug])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редагувати
                                    </a>
                                    <button type="submit" onclick="deleteConfirmation({{ $category->id }})" class="btn btn-danger btn-sm delete-btn">Видалити</button>
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
</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="deleteConfirmation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Ви дійсно бажаєте видалити цю категорію?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteCategory()">Видалити</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-target="#deleteConfirmation">Відміна</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory(){
        @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
