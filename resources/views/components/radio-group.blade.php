<div>
    @if ($allOpt)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" id="" value="" @checked(!request($name))>
            <span class="ml-2">All</span>
        </label>
    @endif

    @foreach ($optionsWithLabels as $lable => $opt)
        <label for="{{ $name }}" class="flex items-center">
            <input type="radio" name="{{ $name }}" id="" value="{{ $opt }}"
                @checked($opt === ($value ?? request($name)))>
            <span class="ml-2">{{ $opt }}</span>
        </label>
    @endforeach

    @error($name)
        <div class="mt-1 text-xs text-red-600">
            {{ $message }}
        </div>
    @enderror
</div>
