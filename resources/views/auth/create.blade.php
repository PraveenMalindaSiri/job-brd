<x-layout>

    <h1 class="my-16 text-center text-4xl font-medium">
        Sign in to your account
    </h1>

    <x-card class="py-8 px-20">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="my-5">
                <label for="email" class="mb-2 text-sm font-medium">E-mail</label>
                <x-text-input name="email" />
            </div>

            <div class="my-5">
                <label for="password" class="mb-2 text-sm font-medium">Password</label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="flex justify-between my-5">
                <div>
                    <div class="">
                        <input type="checkbox" name="remember" id=""
                            class="rounded-sm border border-slate-700">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div><a href="#" class="hover:underline text-indigo-600">Forgot Password?</a></div>
            </div>

            <x-button class="w-full py-4">Login</x-button>

        </form>
    </x-card>

</x-layout>
