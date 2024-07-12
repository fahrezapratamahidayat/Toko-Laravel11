<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mx-auto max-w-sm rounded-xl border shadow bg-card text-card-foreground">
            <div class="flex flex-col p-6 space-y-1.5">
                <h3 class="font-semibold tracking-tight leading-none">Sign Up</h3>
                <p class="text-sm text-muted-foreground">
                    Enter your information to create an account
                </p>
            </div>
            <div class="p-6 pt-0">
                <div class="grid gap-4">
                    <div class="grid gap-2">
                        <x-ui.label for="name">Fullname</x-ui.label>
                        <x-ui.input id="name" name="name" placeholder="Firstname" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="username">Last name</x-ui.label>
                        <x-ui.input id="username" name="username" placeholder="Username" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="email">Email</x-ui.label>
                        <x-ui.input id="email" name="email" placeholder="email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="password">Password</x-ui.label>
                        <x-ui.input id="password" name="password" placeholder="password" required />
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="password_confirmation">Confirm Password</x-ui.label>
                        <x-ui.input id="password_confirmation" name="password_confirmation" placeholder="" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <button type="submit"
                        class="inline-flex justify-center items-center px-4 py-2 h-9 text-sm font-medium whitespace-nowrap rounded-md shadow transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90">
                        Create an account
                    </button>
                    <x-ui.Button>Sign with GitHub</x-ui.Button>
                </div>
                <div class="mt-4 text-sm text-center">
                    Already have an account?
                    <a href="/login" class="underline">
                        Sign in
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>