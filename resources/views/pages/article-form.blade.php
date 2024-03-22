<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="title" value="{{ $data->title  }}" label="title" />
        </div>
        <div class="col-md-6">
            <div class="input-mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea id="exampleFormControlTextarea1" class="form-control" name="description" aria-label="With textarea">{{ $data->description  }} </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select id="tags" name="tags[]" class="select2 form-select form-select-sm" multiple>
                   @foreach ($tags as $item)
                       <option value="{{ $item->id }}" @selected(in_array($item->id, $data->tags->pluck('id')->toArray())) >{{ $item->name }}</option>
                   @endforeach 
                </select>

            </div>
        </div>
        <div class="col-12">
            <x-form.radio name="approval" inline="true" :options="['Setujui' => 1, 'Tolak' => 0]" label="Approval" value="{{ $data->status_approve }}" />
        </div>
        <div class="col-md-6">
            <div class="input-mb-3">
                <label for="keterangan_approve" class="form-label">Keterangan Approve</label>
                <textarea id="keterangan_approve" class="form-control" name="keterangan_approve" aria-label="With textarea">{{ $data->keterangan_approve }} </textarea>
            </div>
        </div>
    </div>
</x-form.modal>