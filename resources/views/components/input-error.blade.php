@props(['messages'])

@if ($messages)
    <ul  style="width: 490px; margin-left: 80px" {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>
        @foreach ((array) $messages as $message)
            <li class="list-group-item-danger">{{ $message }}</li>
        @endforeach
    </ul>
@endif
