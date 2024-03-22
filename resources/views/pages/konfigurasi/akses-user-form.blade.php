<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-12">
            <h5>User: {{ $data->name }}</h5>
            <div class="mb-3 mt-3">
                <x-form.select class="copy" label="Copy dari user" placeholder="Pilih user" :options="$users"/>
                <x-form.input name="search" class="search" label="Cari menu" placeholder="Cari..."/>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="menu_permissions">
                        @include('pages.konfigurasi.akses-user-items')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-form.modal>