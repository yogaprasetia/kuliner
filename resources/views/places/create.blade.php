<x-templates.default>
    <x-slot name="title">Tambah Tempat Kuliner</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Tambah Data Tempat Kuliner</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tempat Kuliner" value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Tempat Kuliner" value="{{ old('description') }}"></textarea>

                        @error('description')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select name="sub_district_id" id="" class="form-control @error('sub_district_id') is-invalid @enderror">
                            @foreach ($subDistricts as $subDistrict)
                            <option value="{{ $subDistrict->id }}">{{ $subDistrict->name }}</option>
                            @endforeach
                        </select>

                        @error('sub_district_id')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Masukkan Alamat Tempat Kuliner" value="{{ old('address') }}">

                        @error('address')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Nomor WA</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukkan Nomor WA" value="{{ old('phone') }}">

                        @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        placeholder="Masukkan Foto Tempat Kuliner" value="{{ old('image') }}">

                        @error('image')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="">Latitude</label>
                                <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Latitude">

                                @error('latitude')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="">Longitude</label>
                                <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Longitude">

                                @error('longitude')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Simpan" class="btn btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-templates.default>
