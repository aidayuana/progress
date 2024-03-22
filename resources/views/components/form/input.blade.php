@props(['name', 'label', 'value' => '', 'id' => $name])
<div class="mb-3">
    <label class="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="text" id ="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}" value="{{ $value }}">
</div>