<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Всі кольори</h1>
                </div><!-- /.col -->
                <div>
                    <button class="btn btn-success">
                        <a href="{{ route('admin.color.create') }}" style="text-decoration: none; color: #f2f4f5">Додати
                            колір</a>
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
                                Фото
                            </th>
                            <th style="width: 20%">
                                Найменування
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <td>
                                    {{$color->id}}
                                </td>
                                <td>
                                    <div class="color_item" style="">
                                        <img src="{{asset('assets/images/colors')}}/{{$color->image}}" alt=""
                                             style="display: block; width: 120px">
                                    </div>
                                </td>
                                <td>
                                    {{$color->title}}
                                </td>
                                <td class="project-actions text-right">
                                    <button type="submit" onclick="deleteConfirmation({{ $color->id }})" class="btn btn-danger btn-sm delete-btn">Видалити</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="paginate_container mb-4 d-flex justify-content-between">
            {{ $colors->links('admin-pagination-links') }}
        </div>
    </section>
    <!-- /.content -->
</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="deleteConfirmation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Ви дійсно бажаєте видалити цей колір?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteColor()">Видалити</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-target="#deleteConfirmation">Відміна</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
        @this.set('color_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteColor(){
        @this.call('deleteColor');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush

