{{-- @props([
    'headers' => [],
])

<table class="table-netjer">
    <thead>
        <tr>
            @foreach ($headers as $header)
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
 --}}
@props([
    'headers' => [],
])

<div class="w-full overflow-hidden">
    <table class="table-netjer w-full text-sm">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th class="border-b p-3 font-bold text-left">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
