<x-templates.default>
    <x-slot name="title">Tambah Kategori</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Tambah Data Kategori</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori">
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-templates.default>
