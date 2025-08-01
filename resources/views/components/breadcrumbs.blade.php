<nav {{ $attributes }}>
    <ul class="flex space-x-1 justify-start text-lg pt-4 ml-10">
        <li class="hover:text-white"><a href="/">Home</a></li>

        @foreach ($links as $lable => $link)
            <li>»<li>
            <li class="hover:text-white"><a href="{{ $link }}">{{ $lable }}</a></li>
        @endforeach
    </ul>
</nav>
