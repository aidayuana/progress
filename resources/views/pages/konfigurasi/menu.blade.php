<x-master-layout>
    <div class="main-content">
        <div class="title">
            Konfigurasi
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Menu</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @can('create konfigurasi/menu')
                                <a class="mb-3 btn btn-primary action" href="{{ route('konfigurasi.menu.create') }}">Add</a>
                            @endcan
                            @can('sort konfigurasi/menu')
                                <a class="mb-3 btn btn-info sort" href="{{ route('konfigurasi.menu.sort') }}">Sort Menu</a>
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
            const datatable = 'menu-table';

            function handleMenuChange() {
                $('[name=level_menu]').on('change', function() {
                    if (this.value == 'sub_menu') {
                        $('#main_menu_wrapper').removeClass('d-none');
                    } else {
                        $('#main_menu_wrapper').addClass('d-none');
                    }
                })
            }

            $('.sort').on('click', function(e) {
                e.preventDefault();

                handleAjax(this.href, 'put')
                .onSuccess(function(res) {
                    window.location.reload()
                }, false)
                .execute();
            });


            handleAction(datatable, function(e) {
                handleMenuChange()
            });
        </script>
    @endpush
</x-master-layout>