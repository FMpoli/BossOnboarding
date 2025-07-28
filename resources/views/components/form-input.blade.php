@props([
    'name',
    'label',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'value' => '',
    'error' => null,
    'helpText' => null,
    'aria-describedby' => null
])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <div class="mt-2">
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value }}"
            @if($required) required @endif
            placeholder="{{ $placeholder }}"
            @if($aria-describedby) aria-describedby="{{ $aria-describedby }}" @endif
            {{ $attributes->merge([
                'class' => 'block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6' . ($error ? ' ring-red-300 focus:ring-red-500' : '')
            ]) }}
        >
    </div>

    @if($helpText)
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif

    @if($error)
        <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $error }}</p>
    @endif
</div>
