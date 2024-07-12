<x-guest-layout>
    <!-- Session Status
    <x-auth-session-status class="mb-4" :status="session('status')" /> -->
    <div class="mx-auto max-w-sm rounded-xl border shadow bg-card text-card-foreground">
        <div class="flex flex-col p-6 space-y-1.5">
            <h3 class="font-semibold tracking-tight leading-none">Login</h3>
            <p class="text-sm text-muted-foreground">
                Enter your email below to login to your account
            </p>
        </div>
        <div class="p-6 pt-0">
            <div class="grid gap-4">
                <div class="grid gap-2">
                    <label htmlFor="email">Email</label>
                    <input
                        class="flex px-3 py-1 w-full h-9 text-sm bg-transparent rounded-md border shadow-sm transition-colors border-input file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                        id="email" type="email" placeholder="m@example.com" required />
                </div>
                <div class="grid gap-2">
                    <label htmlFor="password">Password</label>
                    <input
                        class="flex px-3 py-1 w-full h-9 text-sm bg-transparent rounded-md border shadow-sm transition-colors border-input file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                        id="password" type="password" />
                </div>
                <button type="submit"
                    class="inline-flex justify-center items-center px-4 py-2 h-9 text-sm font-medium whitespace-nowrap rounded-md shadow transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90">
                    Create an account
                </button>
                <x-ui.Button>Sign with GitHub</x-ui.Button>
            </div>
            <div class="mt-4 text-sm text-center">
                Don&apos;t have an account?
                <a href="/register" class="underline">
                    Sign up
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>