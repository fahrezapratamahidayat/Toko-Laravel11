@props(['categories', 'product'])
<button type="button"
    class="inline-flex gap-x-2 items-center px-3 py-2.5 ml-auto text-sm font-medium rounded-lg border shadow-sm text-primary border-border disabled:opacity-50 disabled:pointer-events-none hover:bg-muted"
    data-hs-overlay="#hs-basic-modal-update">
    <svg class="mr-2 w-4 h-4" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"
            d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
    </svg>
    Edit Product
</button>
<div id="hs-basic-modal-update"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="m-3 opacity-0 transition-all hs-overlay-open:opacity-100 hs-overlay-open:backdrop-blur-lg hs-overlay-open:duration-500 sm:max-w-xl sm:w-full sm:mx-auto">
        <div class="flex flex-col rounded-xl shadow-sm pointer-events-auto bg-background">
            <div class="flex justify-between items-center px-4 py-3 border-b dark:border-neutral-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    Edit Product
                </h3>
                <button type="button"
                    class="flex justify-center items-center text-sm font-semibold text-gray-800 bg-transparent rounded-full border border-transparent size-7 disabled:opacity-50 disabled:pointer-events-none text-primary">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="overflow-y-auto p-4">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-primary">Name</label>
                            <input type="text" name="name" id="name" value="{{ $product->name }}"
                                class="block p-2.5 w-full text-sm rounded-lg border border-border bg-input text-primary focus:ring-primary-600 focus:border-primary-600 placeholder:text-muted-foreground dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="product name" required>
                            @error('name')
                                <div class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-primary">Brand</label>
                            <input type="text" name="brand" id="brand"
                                class="block p-2.5 w-full text-sm rounded-lg border border-border bg-input text-primary focus:ring-primary-600 focus:border-primary-600 placeholder:text-muted-foreground dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Product brand" required="">
                            @error('brand')
                                <div class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-primary">Price</label>
                            <input type="number" name="price" id="price"
                                class="block p-2.5 w-full text-sm rounded-lg border border-border bg-input text-primary focus:ring-primary-600 focus:border-primary-600 placeholder:text-muted-foreground dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="harga Product" required="">
                            @error('price')
                                <div class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="category_id"
                                class="block mb-2 text-sm font-medium text-primary">Category</label>
                            <div class="relative">
                                <select id="category_id" name="category_id" required class="block w-full p-2.5 text-sm rounded-lg border text-primary bg-input appearance-none border-border focus:ring-ring
                                                               [&:required:invalid]:text-gray-400">
                                    <option value="" disabled selected hidden class="text-gray-400">Pilih Category
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id ?? old('category_id') }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div
                                    class="flex absolute inset-y-0 right-0 items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="stock" class="w-full text-sm font-medium text-primary">Stok:</label>
                            <input type="text" id="stock" name="stock" value="{{ old('stock') }}"
                                class="block p-2.5 w-full text-sm rounded-lg border border-border bg-input text-primary focus:ring-primary-500 focus:border-primary-500 placeholder:text-muted-foreground dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Stok Product" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-primary">Description</label>
                            <textarea id="description" rows="4" name="description"
                                class="block p-2.5 w-full text-sm rounded-lg border border-border bg-input text-primary focus:ring-primary-500 focus:border-primary-500 placeholder:text-muted-foreground dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Write product description here"></textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-primary">Product
                                Images</label>
                            <div class="flex overflow-hidden relative flex-col gap-6">
                                <div
                                    class="grid relative place-items-center px-5 py-2.5 w-full h-52 text-center rounded-lg border-2 border-dashed transition cursor-pointer group border-muted-foreground/25 hover:bg-muted/25 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2">
                                    <input type="file" name="image" id="image"
                                        class="absolute inset-0 w-full h-full opacity-0 group-hover:cursor-pointer"
                                        required />
                                    <div class="flex flex-col justify-center items-center">
                                        <svg class="size-7 text-muted-foreground" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-upload">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="17 8 12 3 7 8" />
                                            <line x1="12" x2="12" y1="3" y2="15" />
                                        </svg>
                                        <p class="mt-2 text-sm text-muted-foreground">Upload product images</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>