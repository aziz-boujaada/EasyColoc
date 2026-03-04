@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-xs font-bold text-red-500 space-y-1 mt-1.5']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                </svg>
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif
