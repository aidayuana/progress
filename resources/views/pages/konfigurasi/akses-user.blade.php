<x-master-layout>
    <div class="main-content">
        <div class="title">
            Konfigurasi
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Akses User</h4>
                </div>
                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
    @push('js')
        {!! $dataTable->scripts() !!}

        <script>
            const datatable = 'user-table';

            function handleCheckMenu() {
                $('.parent').on('click', function() {
                    const childs = $(this).parents('tr').find('.child')
                    childs.prop('checked', this.checked)
                })

                $('.child').on('click', function() {
                    const parent = $(this).parents('tr')
                    const childs = parent.find('.child')
                    const checked = parent.find('.child:checked')

                    parent.find('.parent').prop('checked', childs.length == checked.length)
                })

                $('.parent').each(function() {
                    const parent = $(this).parents('tr')
                    const childs = parent.find('.child')
                    const checked = parent.find('.child:checked')

                    parent.find('.parent').prop('checked', childs.length == checked.length)
                })
            }

            handleAction(datatable, function() {
                handleCheckMenu()
                
                $('.search').on('keyup', function() {
                    const value = this.value.toLowerCase()
                    $('#menu_permissions tr').show().filter(function(i, item) {
                        return item.innerText.toLowerCase().indexOf(value) == '-1'
                    }).hide()
                })

                $('.copy').on('change', function() {
                    handleAjax(`{{ url('konfigurasi/akses-user') }}/${this.value}/user`)
                    .onSuccess(function(res) {
                        $('#menu_permissions').html(res)
                        handleCheckMenu()
                    }, false)
                    .execute();
                })
            });
            handleDelete(datatable);

            
        </script>
    @endpush
</x-master-layout>