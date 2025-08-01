<div>
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $name }}" id="" value="" @checked(!request($name))>
        <span class="ml-2">All</span>
    </label>

    @foreach ($optionsWithLabels as $lable => $opt)
        <label for="{{ $name }}" class="flex items-center">
            <input type="radio" name="{{ $name }}" id="" value="{{ $opt }}"
                @checked($opt === request($name))>
            <span class="ml-2">{{ $opt }}</span>
        </label>
    @endforeach
</div>
