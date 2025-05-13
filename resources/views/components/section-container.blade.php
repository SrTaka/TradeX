@props(['title' => null])

<div class="p-4 sm:p-8 md:pl-64">
    @if($title)
        <h1 class="text-2xl font-bold mb-6">{{ $title }}</h1>
    @endif
    {{ $slot }}
</div> 