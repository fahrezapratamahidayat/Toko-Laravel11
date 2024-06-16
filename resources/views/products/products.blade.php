<x-app-layout>
    <div class="grid grid-cols-1 gap-6 p-4 mt-20 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
        @foreach ($products as $product)
                <div
                    class="flex overflow-hidden flex-col w-full rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-xl">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                        class="object-cover w-full h-48">
                    <div class="p-4">
                        <h1 class="text-xl font-bold">{{ $product->name }}</h1>
                        <p class="text-sm">{{ $product->description }}</p>
                        <span class="text-sm">Stock: {{ $product->stock }}</span>
                        @php
                            $formattedPrice = number_format($product->price, 0, ',', '.');
                        @endphp
                        <span class="text-lg font-semibold">Rp {{ $formattedPrice }}</span>
                        <a href="/product/{{$product->slug}}"
                            class="inline-block mt-2 text-blue-500 transition-colors duration-200 hover:text-blue-600">
                            Lihat Details
                        </a>
                    </div>
                </div>
        @endforeach
    </div>
</x-app-layout>