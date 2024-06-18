@extends('layouts.admin')

@section("content")
<div class="mx-6">
    <div class="p-5 mt-2 rounded-lg shadow-lg">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="w-full text-sm font-medium">Nama Produk:</label>
                <input type="text" id="name" name="name" value="{{ $product->name ?? old('name') }}"
                    class="px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('name')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="w-full text-sm font-medium">Deskripsi:</label>
                <textarea id="description" name="description"
                    class="px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm resize-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>{{ $product->description ?? old('description') }}</textarea>
                @error('description')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="w-full text-sm font-medium">Harga:</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ $product->price ?? old('price') }}"
                    class="px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="stock" class="w-full text-sm font-medium">Stok:</label>
                <input type="text" id="stock" name="stock" value="{{ $product->stock ?? old('stock') }}"
                    class="px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="w-full text-sm font-medium">ID Kategori:</label>
                <select id="category_id" name="category_id"
                    class="px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <div class="mb-4">
                    <label for="inputImage" class="w-full text-sm font-medium"><strong>Image:</strong></label>
                    <input type="file" accept="image/png, image/jpeg" name="image"
                        class="px-3 py-2 mt-1 w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        id="inputImage">
                    @error('image')
                        <div class="mt-2 text-sm text-red-500r">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="px-4 py-2 w-full font-bold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                Tambah Produk
            </button>
        </form>
    </div>
</div>
@endsection