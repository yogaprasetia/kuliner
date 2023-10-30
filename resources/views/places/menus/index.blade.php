<x-templates.default>
    <x-slot name="title">Data Menu dari {{ $place->name }}</x-slot>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('menu.create', $place) }}" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
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
                        <button type="button" class="btn btn-danger" data-id-place="" data-id-menu="" id="ConfirmDelete">Hapus</button>
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
                    ajax: '{!! route('menu.index', request()->segment(2)) !!}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex', orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });

                $('#dataTable').on('click', 'a#delete', function(e) {
                e.preventDefault()
                var idPlace = $(this).data('id-place')
                var idMenu = $(this).data('id-menu')

                $('#ConfirmDelete').attr('data-id-place', idPlace)
                $('#ConfirmDelete').attr('data-id-menu', idMenu)
                $('#deleteModal').modal('show')
            });

            $('#ConfirmDelete').click(function(e) {
                e.preventDefault()
                var idPlace = $(this).data('id-place')
                var idMenu = $(this).data('id-menu')

                $.ajax({
                    type: 'DELETE',
                    url: '/places/' + idPlace + '/menu/' + idMenu,
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
