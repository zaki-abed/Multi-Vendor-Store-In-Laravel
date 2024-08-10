{{-- Propertise --}}
@props([
    'name',
    'type',
    'id',
    'value' => '',
    'label' => 'false'
])
{{-- Label --}}
@if($label)

<label for="{{ $id }}">{{ $label }}</label>

@endif
{{-- input --}}

<input
    name="{{ $name }}"
    type="{{ $type ?? 'text' }}"
    id="{{ $id ?? '' }}"
    placeholder="Enter {{ $name }}"
    value="{{ old('$name', $value) }}"
    {{-- class="@error('name') is-invalid @enderror" --}}
    {{-- {{ $attributes }} --}}
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name),
    ]) }}
>

{{-- Error --}}
@error($name)
        <p class="invalid-feedback">{{ $message }}</p>
@enderror
