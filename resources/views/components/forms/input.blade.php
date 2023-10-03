<input
    name="{{ $name }}"
    type="{{ $type }}"
    id="{{ $id }}"
    @if($value !==  null)value="{{ $value }}"@endif
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
/>

@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
