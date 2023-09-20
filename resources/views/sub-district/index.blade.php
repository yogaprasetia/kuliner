<x-templates.default>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Data Kecamatan</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
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
    @endpush
</x-templates.default>
