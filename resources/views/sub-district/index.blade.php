<x-templates.default>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Semua Data</h1>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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
                    ajax: '{!! route('subdistrict.index') !!}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex', orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'slug',
                            name: 'slug'
                        }
                    ]
                });
            });
        </script>
    @endpush
    <x-slot name="title">Data Kecamatan</x-slot>
</x-templates.default>
