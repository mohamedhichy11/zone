@props(['type'])

<div class="alert alert-{{ $type }}" role="alert" id="alert">
    {{ $slot }}
</div>
