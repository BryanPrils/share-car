<label
    for="{{ $for }}"
    {{ $attributes->class(['form-label']) }}
>
    {{ $slot ?? $fallback }}
</label>
