@props(['messages'])

@if ($messages)
    @php
        $style = [
            'class' => 'text-sm text-red-600 space-y-1',
            'style' => 'padding:0; color: red; list-style-type: none'
        ];
    @endphp
    <ul {{ $attributes->merge($style) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
