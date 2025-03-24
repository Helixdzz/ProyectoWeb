<!-- resources/views/components/label.blade.php -->
@props(['for', 'value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }} for="{{ $for }}">
    {{ $value ?? $slot }}
</label>