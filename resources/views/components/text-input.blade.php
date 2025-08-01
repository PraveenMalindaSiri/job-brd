<div class="relative">
    <button class="absolute top-0 right-0 h-full flex items-center pr-2" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-blue-400" onclick="document.getElementById('{{ $name }}').value = ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
    <input type="text" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}"
        id="{{ $name }}"
        class="w-full rounded-md border-0 p-2 text-sm ring-1 ring-slate-300 placeholder:text-blue-400 focus:ring-1">
</div>
