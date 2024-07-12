<nav class="antialiased ">
    <div class="px-4 py-1 border-b border-border ">
        <div class="flex justify-between items-center ">
            <div class="flex items-center space-x-8">
                <div class="shrink-0">
                </div>
                <ul class="hidden gap-6 justify-start items-center py-3 lg:flex md:gap-8 sm:justify-center">
                    <li>
                        <a href="/"
                            class="hover:text-primary-700 dark:hover:text-primary-500 text-base font-semibold">Home</a>
                    </li>
                    <li>
                        <a href="/products"
                            class="hover:text-primary-700 dark:hover:text-primary-500 text-base font-semibold">Products</a>
                    </li>
                </ul>
            </div>
            <x-theme-toggel />
            @auth
                <div class="flex items-center lg:space-x-2">
                    <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                        class="inline-flex justify-center items-center p-2 text-sm font-medium leading-none text-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                        <span class="sr-only">
                            Cart
                        </span>
                        <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                        <span class="hidden sm:flex">My Cart</span>
                        <svg class="hidden w-4 h-4 text-gray-900 sm:flex dark:text-white ms-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="myCartDropdown1"
                        class="hidden overflow-hidden z-10 p-4 mx-auto space-y-4 max-w-sm antialiased bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        @if (0 > 1)
                            <button type="button"
                                class="px-5 py-2.5 mb-2 w-full text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Checkout Sekarang
                            </button>
                        @else
                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                Your cart is empty
                            </p>
                        @endif
                    </div>

                    <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button"
                        class="inline-flex justify-center items-center p-2 text-sm font-medium leading-none text-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                        <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Account
                        <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="userDropdown1"
                        class="hidden overflow-hidden overflow-y-auto z-10 w-56 antialiased bg-white rounded-lg divide-y divide-gray-100 shadow dark:divide-gray-600 dark:bg-gray-700">
                        <ul class="p-2 text-sm font-medium text-gray-900 text-start dark:text-white">
                            <li><a href="/profile" title=""
                                    class="inline-flex gap-2 items-center px-3 py-2 w-full text-sm rounded-md hover:bg-gray-100 dark:hover:bg-gray-600">
                                    My Account </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex gap-2 items-center px-3 py-2 w-full text-sm rounded-md hover:bg-gray-100 dark:hover:bg-gray-600">
                                    My Orders </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex gap-2 items-center px-3 py-2 w-full text-sm rounded-md hover:bg-gray-100 dark:hover:bg-gray-600">
                                    Settings </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex gap-2 items-center px-3 py-2 w-full text-sm rounded-md hover:bg-gray-100 dark:hover:bg-gray-600">
                                    Favourites </a></li>
                        </ul>

                        <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="inline-flex gap-2 items-center px-3 py-2 w-full text-sm rounded-md hover:bg-gray-100 dark:hover:bg-gray-600">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>

                    <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                        aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                        class="inline-flex justify-center items-center p-2 text-gray-900 rounded-md lg:hidden hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                        <span class="sr-only">
                            Open Menu
                        </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 7h14M5 12h14M5 17h14" />
                        </svg>
                    </button>
                </div>
            @else
                <button type="button"
                    class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </button>
            @endauth
        </div>
        <div id="ecommerce-navbar-menu-1"
            class="hidden px-4 py-3 mt-4 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <ul class="space-y-3 text-sm font-medium text-gray-900 dark:text-white">
                <li>
                    <a href="/"
                        class="hover:text-primary-700 dark:hover:text-primary-500 text-base font-semibold">Home</a>
                </li>
                <li>
                    <a href="/products"
                        class="hover:text-primary-700 dark:hover:text-primary-500 text-base font-semibold">Products</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('myCartDropdownButton1').click();
    });
</script>