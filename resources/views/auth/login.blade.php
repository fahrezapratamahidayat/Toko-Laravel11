<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" /> <!-- Mengaktifkan kembali status sesi -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mx-auto max-w-sm rounded-xl border shadow bg-card text-card-foreground">
            <div class="flex flex-col p-6 space-y-1.5">
                <h3 class="font-semibold tracking-tight leading-none">Login</h3>
                <p class="text-sm text-muted-foreground">
                    Masukkan email Anda di bawah ini untuk masuk ke akun Anda
                </p>
                <!-- Menampilkan error validasi -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-sm list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="p-6 pt-0">
                <div class="grid gap-4">
                    <div class="grid gap-2">
                        <label for="email">Email</label>
                        <input
                            class="flex px-3 py-1 w-full h-9 text-sm bg-transparent rounded-md border shadow-sm transition-colors border-input file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                            id="email" name="email" type="email" value="{{ old('email') }}" required autofocus />
                    </div>
                    <div class="grid gap-2">
                        <label for="password">Kata Sandi</label>
                        <input
                            class="flex px-3 py-1 w-full h-9 text-sm bg-transparent rounded-md border shadow-sm transition-colors border-input file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                            id="password" name="password" type="password" required autocomplete="current-password" />
                    </div>
                    <button type="submit"
                        class="inline-flex justify-center items-center px-4 py-2 h-9 text-sm font-medium whitespace-nowrap rounded-md shadow transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90">
                        Login
                    </button>
                    <x-ui.Button><a href="{{ route('social.redirect', 'google') }}"
                            class="inline-flex justify-center items-center px-4 py-2 h-9 text-sm font-medium whitespace-nowrap rounded-md shadow transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90">
                            Masuk dengan GitHub
                        </a></x-ui.Button>
                </div>
                <div class="mt-4 text-sm text-center">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="underline">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>