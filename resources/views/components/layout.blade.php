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
    <nav class="mb-5 flex justify-between text-lg mt-10">
        <ul>
            <li><a href="{{ route('jobs.index') }}" class="hover:text-white border p-2 rounded-xl">Home</a></li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li>
                    <a class="hover:text-white border p-2 rounded-xl"
                        href="{{ route('my-job-application.index') }}">{{ auth()->user()->name ?? 'Guest' }}</a>
                </li>
                <li>
                    <a href="{{ route('my-job.index') }}" class="hover:text-white border p-2 rounded-xl">My Jobs</a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="hover:text-red-600 hover:underline">Logout</button>
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
            <p class="pl-10">{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="py-5 my-8 rounded-md border-l-4 border-red-600 bg-red-400 text-red-900">
            <p class="font-bold pl-10">Error!!!</p>
            <p class="pl-10">{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
