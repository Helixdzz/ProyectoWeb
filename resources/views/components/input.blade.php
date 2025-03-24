<!-- resources/views/components/input.blade.php -->
@props(['type' => 'text', 'name', 'value' => '', 'required' => false, 'autofocus' => false])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    {{ $required ? 'required' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }}
/>