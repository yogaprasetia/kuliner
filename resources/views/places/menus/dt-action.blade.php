<a href="{{ route('menu.edit', [$model->place->id, $model]) }}" class="btn btn-warning">Edit</a>
<a href="#" id="delete" data-id-place="{{ $model->place->id }}" data-id-menu="{{ $model->id }}" class="btn btn-danger">Hapus</a>
