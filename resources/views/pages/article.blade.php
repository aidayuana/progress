<x-master-layout>
    @push('cssLibrary')
    <link href="{{ asset('') }}vendor/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    @endpush

    @push('jsLibrary')
    <script src="{{ asset('') }}vendor/select2/js/select2.min.js"></script>
    @endpush
    <div class="main-content">
        <div class="title">
            Article
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Article</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @can('create article')
                                <a class="mb-3 btn btn-primary action" href="{{ route('article.create') }}">Add</a>
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
            const datatable = 'article-table';

            const url = new URL(window.location)

            if (url.searchParams.get('ref') == 'notification') {
                handleAjax(url.origin + url.pathname + `/${url.searchParams.get('id')}/approve`)
                .onSuccess(function(res) {
                    select2Init()
                    handleformsubmit()
                    .init()
                })
                .execute()
            }

            handleAction(datatable, function() {
                select2Init();
            });
            handleDelete(datatable);

            
        </script>
    @endpush
</x-master-layout>