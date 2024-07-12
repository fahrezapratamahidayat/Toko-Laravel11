@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-[0.8rem] font-medium text-destructive']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
