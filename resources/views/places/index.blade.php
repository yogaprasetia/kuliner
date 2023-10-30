<x-templates.default>
    <x-slot name="title">Data Tempat Kuliner</x-slot>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('places.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kecamatan</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Yakin Ingin Hapus Data Ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" data-id="" id="ConfirmDelete">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('extra-styles')
        <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    @endpush

    @push('extra-scripts')
        <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
        <script>
            $(function() {
                $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('places.index') !!}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex', orderable: false
                        },
                        {
                            data: 'place-menu',
                            name: 'place-menu'
                        },
                        {
                            data: 'subDistrictName',
                            name: 'subDistrictName'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'address',
                            name: 'address'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });

                $('#dataTable').on('click', 'a#delete', function(e) {
                var id = $(this).data('id')
                e.preventDefault()
                $('#ConfirmDelete').attr('data-id', id)
                $('#deleteModal').modal('show')
            });

            $('#ConfirmDelete').click(function(e) {
                e.preventDefault()
                var id = $(this).data('id')
                $.ajax({
                    type: 'DELETE',
                    url: 'places/' + id,
                    data: {
                        '_token': "{{ csrf_token() }}"
                    },

                    success: function(response) {
                        if (response.success) {
                            window.location.href = ''
                        }

                    },
                })
            })
            });
        </script>
    @endpush
</x-templates.default>
