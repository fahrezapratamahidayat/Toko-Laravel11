<x-app-layout>
    <div class="grid grid-cols-1 gap-6 p-4 md:grid-cols-2 lg:grid-cols-5 lg:gap-8">
        @foreach ($products as $product)
            <div class="w-72 bg-white rounded-xl shadow-md duration-500 hover:scale-105 hover:shadow-xl">
                <a href="/product/{{ $product->slug}}">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                        class="object-cover w-full h-48 rounded-t-md">
                    <div class="px-4 py-3 w-72">
                        <span class="mr-3 text-xs text-gray-400 uppercase">{{ $product->category->name }}</span>
                        <p class="block text-lg font-bold text-black capitalize truncate">{{ $product->name }}</p>
                        <div class="flex items-center">
                            <p class="my-3 text-lg font-semibold text-black cursor-auto">Rp {{ $product->price }}</p>
                            <del>
                                <p class="ml-2 text-sm text-gray-600 cursor-auto">Rp {{ $product->price }}</p>
                            </del>
                            <div class="ml-auto">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>