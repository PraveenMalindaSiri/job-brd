<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-sky-300 via-[#00f0ff] to-[#004182] text-slate-900 mx-60">
    <nav class="mb-5 flex justify-between text-lg ">
        <ul>
            <li><a href="{{ route('jobs.index') }}">Home</a></li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li>
                    <a href="{{ route('my-job-application.index') }}">{{ auth()->user()->name ?? 'Guest' }}:
                        Applications
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('auth.create') }}">Sign In</a></li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
        <div role="alert" class="py-5 my-8 rounded-md border-l-4 border-green-600 bg-green-400 text-green-900">
            <p class="font-bold pl-10">Success!!!</p>
            <p>{{ session('successs') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
