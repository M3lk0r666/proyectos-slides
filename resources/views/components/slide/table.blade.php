@props([
    'headers' => []
])

<table class="w-full border-collapse text-left">
    <thead>
        <tr>
            @foreach($headers as $header)
                <th class="border-b p-3 font-bold">
                    {{ $header }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>