@extends('layouts.admin')

@section('content')
    <section class="p-3 h-full sm:p-5">
        <div class="px-4 max-w-screen-xl">
            <div class="overflow-hidden relative rounded-lg bg-background">
                <div class="flex flex-col justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="flex">
                        <form class="flex items-center" method="GET" action="{{ route('products.index') }}">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" name="search" value="{{ request('search') }}"
                                    class="block p-2 pl-10 w-[365px]  border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Search" required="">
                            </div>
                            @if (request()->has('search') && request()->input('search') != '')
                                <button type="button"
                                    class="inline-flex gap-x-2 items-center px-4 py-3 ml-3 text-sm font-semibold text-blue-600 rounded-lg border border-transparent hover:bg-blue-100 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:bg-blue-800/30 dark:hover:text-blue-400">
                                    <a class="" href="{{ route('products.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </a>
                                </button>
                            @endif
                        </form>
                    </div>
                    <div
                        class="flex flex-col flex-shrink-0 justify-end items-stretch space-y-2 w-full md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <x-modal.create-product :categories="$categories" />
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <div class="">
                                <form method="GET" action="{{ route('products.index') }}">
                                    <select name="category" onchange="this.form.submit()"
                                        data-hs-select='{
              "placeholder": "<span class=\"inline-flex items-center text-primary\"><svg class=\"flex-shrink-0 size-3 me-2\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polygon points=\"22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3\"/></svg> Filter Category </span>",
              "toggleTag": "<button type=\"button\"></button>",
              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-3 pe-9 flex text-nowrap w-[170px] cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400",
              "dropdownClasses": "mt-2 z-50 w-[170px] max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
              "optionClasses": "py-2 px-4 w-[170px] text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
              "optionTemplate": "<div class=\"flex justify-between items-center w-hidden\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
              "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"flex-shrink-0 size-3.5 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
            }'
                                        class="hidden">
                                        <option value="">Choose</option>
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->name }}"
                                                {{ request('category') == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @empty
                                            <option disabled>No categories</option>
                                        @endforelse
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="absolute top-0 end-0" id="dismiss-alert-success">
                        <div class="max-w-xs bg-green-400 rounded-xl border border-gray-200 shadow-lg dark:bg-neutral-800 dark:border-neutral-700"
                            role="alert">
                            <div class="flex p-4">
                                <div class="flex-shrink-0">
                                    <svg class="flex-shrink-0 mt-0.5 text-green-500 size-4"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm text-white">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('dismiss-alert-success').remove();
                        }, 3000);
                    </script>
                @endif
                @if (session('error'))
                    <div class="absolute top-0 end-0" id="dismiss-alert-error">
                        <div class="max-w-xs text-sm text-white bg-red-500 rounded-xl shadow-lg" role="alert">
                            <div class="flex p-4">
                                {{ session('error') }}
                                <div class="ms-auto">
                                    <button type="button" data-hs-remove-element="#dismiss-alert-error"
                                        class="inline-flex flex-shrink-0 justify-center items-center text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100">
                                        <span class="sr-only">Close</span>
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18"></path>
                                            <path d="m6 6 12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('dismiss-alert-error').remove();
                        }, 3000);
                    </script>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="">
                            <tr>
                                <th scope="col" class="py-3 text-xs font-medium uppercase text-primary text-start">
                                    Nama Produk</th>
                                <th scope="col"
                                    class="hidden py-3 text-xs font-medium uppercase text-primary text-start md:table-cell">
                                    Gambar</th>
                                <th scope="col"
                                    class="hidden py-3 text-xs font-medium uppercase text-primary text-start md:table-cell">
                                    Kategori</th>
                                <th scope="col"
                                    class="hidden py-3 text-xs font-medium uppercase text-primary text-start md:table-cell">
                                    Merek</th>
                                <th scope="col"
                                    class="hidden py-3 text-xs font-medium uppercase text-primary text-start md:table-cell">
                                    Deskripsi</th>
                                <th scope="col" class="py-3 text-xs font-medium uppercase text-primary text-start">
                                    Harga</th>
                                <th scope="col" class="py-3 text-xs font-medium uppercase text-primary text-start">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse ($products as $product)
                                <x-modal.update-product :categories="$categories" :product="$product" />
                                <x-modal.delete-product :product="$product" />
                                <tr class="border-t border-b odd:bg-backgroud even:bg-muted border-border">
                                    <th scope="row" class="px-4 py-3 font-medium whitespace-nowrap text-primary">
                                        {{ Str::limit($product->name, 15) }}
                                    </th>
                                    <td class="hidden px-4 py-3 md:table-cell"><img class="w-12 h-12 text-primary"
                                            src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" />
                                    </td>
                                    <td class="hidden px-4 py-3 md:table-cell text-primary">{{ $product->category->name }}
                                    </td>
                                    <td class="hidden px-4 py-3 md:table-cell text-primary">{{ $product->brand }}</td>
                                    <td class="hidden px-4 py-3 md:table-cell text-primary">{{ $product->description }}
                                    </td>
                                    <td class="px-4 py-3 text-primary">Rp
                                        {{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td class="">
                                        <div class="inline-flex relative hs-dropdown">
                                            <button id="hs-dropdown-with-icons" type="button"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center rounded-lg text-primary">
                                                <span class="sr-only">Actions</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>

                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y z-50 divide-gray-200 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                                aria-labelledby="hs-dropdown-with-icons">
                                                <div class="py-2 first:pt-0 last:pb-0">
                                                    <ul class="z-50 py-1 text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="dropdown-button-{{ $product->id }}">
                                                        <li>
                                                            <button
                                                                class="flex items-center px-4 py-2 w-full text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-200"
                                                                type="button">
                                                                <svg class="mr-2 w-4 h-4"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                </svg>
                                                                <a href="/product/{{ $product->slug }}">
                                                                    Lihat
                                                                </a>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button id="updateProductButton"
                                                                data-modal-target="updateProductModal-{{ $product->id }}"
                                                                data-modal-toggle="updateProductModal-{{ $product->id }}"
                                                                class="flex items-center px-4 py-2 w-full text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dark:text-gray-200"
                                                                type="button">
                                                                <svg class="mr-2 w-4 h-4" viewbox="0 0 14 15"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                    aria-hidden="true">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        fill="currentColor"
                                                                        d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                                </svg>
                                                                Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button id="deleteButton"
                                                                data-modal-target="deleteModal-{{ $product->id }}"
                                                                data-modal-toggle="deleteModal-{{ $product->id }}"
                                                                class="flex items-center px-4 py-2 w-full text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-400"
                                                                type="button">
                                                                <svg class="mr-2 w-4 h-4" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="lucide lucide-trash-2">
                                                                    <path d="M3 6h18" />
                                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                                    <line x1="10" x2="10" y1="11"
                                                                        y2="17" />
                                                                    <line x1="14" x2="14" y1="11"
                                                                        y2="17" />
                                                                </svg>
                                                                Delete product
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="h-[63vh] text-center">
                                        @if (request()->has('search') && request()->input('search') != '')
                                            Tidak ada hasil untuk pencarian "{{ request()->input('search') }}"
                                        @else
                                            Tidak ada produk.
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
