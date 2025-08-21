<label class="mb-2 text-sm font-medium" for="{{ $for }}">
    {{ $slot }}
    @if ($required)
        <span>*</span>
    @endif
</label>
