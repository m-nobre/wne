@props(['value', 'colour'])

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-gray-600 text-nowrap shadow-md", 'style' => "border: 1px solid 
 {$colour}"]) }}>
    {{ $value ?? $slot }}
</span>