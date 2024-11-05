@props(['value', 'colour'])

<span {{ $attributes->merge(['class' => "mr-1 class='inline-flex items-center rounded-md bg-{$colour}-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-{$colour}-500/10'>Badge</span>
"]) }}>
    {{ $value ?? $slot }}
</span>