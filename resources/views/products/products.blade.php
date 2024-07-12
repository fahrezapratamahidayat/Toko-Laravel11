<x-app-layout>
    <div class="grid grid-cols-1 gap-6 p-4 md:grid-cols-2 lg:grid-cols-5 lg:gap-8">
        @foreach ($products as $product)
            <div class="rounded-xl border bg-card text-card-foreground shadow">
                <div class="flex flex-col space-y-1.5 relative overflow-hidden transition-transform duration-300">
                    <a href="/product/{{ $product->slug}}">
                        <img src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/78640eb5-e0ed-4472-90ae-9537819abc9f/phantom-luna-2-elite-fg-high-top-football-boot-kvD5sX.png"
                            alt="{{ $product->name }}" class="object-cover w-full h-56  transition-transform duration-300 rounded-t-md hover:scale-105">
                    </a>
                </div>
                <div class="p-6 pt-3">
                    <h3 class="font-semibold leading-none tracking-tight">{{ $product->category->name }}</h3>
                    <p class="text-sm text-muted-foreground">{{ $product->name }}</p>
                    <div class="flex items-center">
                        <h4 class="my-3 text-xl font-semibold tracking-tight cursor-auto">Rp {{ $product->price }}</h4>
                        <del>
                            <p class="ml-2 text-sm text-muted-foreground">Rp {{ $product->price }}</p>
                        </del>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>