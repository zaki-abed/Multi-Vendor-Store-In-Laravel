@props([
    'name', 'value' => ''
])


<textarea
    id="desc"
    rows="5"
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name),
    ]) }}
    >{{ old($name, $value) }}</textarea>
