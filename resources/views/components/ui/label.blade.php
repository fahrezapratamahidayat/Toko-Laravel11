@props(
    [
        'slot' => 'default',
        'class' => 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70'
    ]
)

<label {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</label>