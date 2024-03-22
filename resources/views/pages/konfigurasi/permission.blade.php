<x-master-layout>
    <div class="main-content">
        <div class="title">
            Konfigurasi
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Permission</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @can('create konfigurasi/permissions')
                                <a class="mb-3 btn btn-primary action" href="{{ route('konfigurasi.permissions.create') }}">Add</a>
                            @endcan
                        </div>
                    </div>
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
    @push('js')
        {!! $dataTable->scripts() !!}

        <script>
            const datatable = 'permission-table';

            handleAction(datatable);
            handleDelete(datatable);
            
        </script>
    @endpush
</x-master-layout>