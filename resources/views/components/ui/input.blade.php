@props([
    'id' => 'default-id',
    'placeholder' => 'Default Placeholder',
    'required' => false,
    'class' => 'flex px-3 py-1 w-full h-9 text-sm bg-transparent rounded-md border shadow-sm transition-colors border-input file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50'
])

<input {{ $attributes->merge(['class' => $class]) }} id="{{ $id }}" placeholder="{{ $placeholder }}" @if($required)
required @endif />