<x-templates.default>
    <x-slot name="title">Perbarui Tempat Kuliner</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Perbarui Tempat Kuliner</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukkan Nama Tempat Kuliner" value="{{ old('name') ?? $place->name }}">

                        @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Tempat Kuliner">{{ old('description') ?? $place->description }}</textarea>

                        @error('description')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select name="sub_district_id" id=""
                            class="form-control @error('sub_district_id') is-invalid @enderror">
                            @foreach ($subDistricts as $subDistrict)
                                <option value="{{ $subDistrict->id }}" @if ($subDistrict->id == $place->sub_district_id)

                               selected @endif>{{ $subDistrict->name }}</option>
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
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            placeholder="Masukkan Alamat Tempat Kuliner" value="{{ old('address') ?? $place->address  }}">

                        @error('address')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Nomor WA</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Masukkan Nomor WA" value="{{ old('phone') ?? $place->phone }}">

                        @error('phone')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            placeholder="Masukkan Foto Tempat Kuliner" value="{{ old('image') ?? $place->image }}">

                        @error('image')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="map"></div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="">Latitude</label>
                                <input type="text" name="latitude" id="latitude"
                                    class="form-control @error('latitude') is-invalid @enderror" placeholder="Latitude" value="{{ old('latitude') ?? $place->latitude }}" readonly>

                                @error('latitude')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="">Longitude</label>
                                <input type="text" name="longitude" id="longitude"
                                    class="form-control @error('longitude') is-invalid @enderror"
                                    placeholder="Longitude" value="{{ old('longitude') ?? $place->longitude }}" readonly>

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

    @push('extra-styles')
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <style>
            #map {
                height: 500px;
            }
        </style>
    @endpush

    @push('extra-scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            var map = L.map('map').fitWorld();

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
            map.locate({
                setView: true,
                maxZoom: 16
            });

            function onLocationFound(e) {
                var radius = e.accuracy;



                var locationMarker = L.marker(e.latlng, { draggable: 'true' }).addTo(map);

                locationMarker.on('dragend', function (event) {
                    var marker = event.target

                    var position = marker.getLatLng();

                    marker.setLatLng(position, {draggable : 'true'}).update()

                    $('#latitude').val(position.lat)
                    $('#longitude').val(position.lng)
                })
            }
            function onLocationError(e) {
                alert(e.message);
            }
            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);
        </script>
    @endpush
</x-templates.default>
