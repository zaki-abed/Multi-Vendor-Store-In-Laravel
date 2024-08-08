
{{-- {{ $options }} --}}

@foreach ($options as $key => $value)

    <div class="form-check">
        <input
            class="form-check-input"
            type="radio"
            name="{{ $name }}"
            id="{{ $value }}"
            value="{{ $key }}"

            @checked(old($name, $checked) == $key)>

            <label class="form-check-label" for="{{ $value }}">{{ $value }}</label>
    </div>
@endforeach
