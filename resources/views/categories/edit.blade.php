<x-templates.default>
    <x-slot name="title">Edit Kategori</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Edit Data Kategori</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $category) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Kategori" value="{{ $category->name }}">

                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-templates.default>
