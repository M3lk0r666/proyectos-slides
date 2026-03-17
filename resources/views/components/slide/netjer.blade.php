{{-- <section class="relative"> --}}
<section class="flex flex-col justify-start w-full h-full px-12 pt-10">

    @if (isset($status))
        <div class="slide-status" style="background: {{ $statusColor ?? '#4CAF50' }}">
            {{ $status }}
        </div>
    @endif

    {{-- <div class="mt-2"> --}}
    <div class="mt-10">
        @if (isset($title))
            <h2 class="mb-10">
                {{ $title }}
            </h2>
        @endif
        {{ $slot }}
    </div>
</section>
