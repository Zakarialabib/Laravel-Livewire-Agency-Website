@props(['vertical' => false])

<div>
    <header x-data="{ isSticky: true, scrollPosition: 0 }" x-init="window.addEventListener('scroll', () => { scrollPosition = window.scrollY;
        isSticky = scrollPosition > 0; })"
        class="fixed top-0 bg-black shadow left-0 w-full z-50 flex justify-between items-center transition-all duration-300">
        <div class="container flex justify-center items-center py-4">
            <a class="lg:mr-8 2xl:mr-20 lg:text-3xl sm:text-xl font-bold font-heading text-white"
                href="{{ route('front.index') }}">
                <img class="w-auto h-10" src="{{ asset('images/' . settings()->site_logo) }}" loading="lazy"
                    alt="{{ settings()->site_title }}" />
            </a>

            <ul class="hidden md:flex px-4 justify-between gap-8 mx-auto font-semibold font-heading">
                <li class="mb-4"> <a class="text-green-500 hover:text-green-700 uppercase text-lg md:text-xl lg:text-3xl hover:underline" 
                        href="#digital">
                        {{ __('The Digital Hub') }}
                    </a>
                </li>
                <li class="mb-4"> <a class="text-green-500 hover:text-green-700 uppercase text-lg md:text-xl lg:text-3xl hover:underline" 
                        href="#startup">
                        {{ __('The Startup Hub') }}
                    </a>
                </li>
                <li class="mb-4"> <a class="text-green-500 hover:text-green-700 uppercase text-lg md:text-xl lg:text-3xl hover:underline" 
                        href="#partners">
                        {{ __('Partners') }}
                    </a>
                </li>
                <li class="mb-4"> <a class="text-green-500 hover:text-green-700 uppercase text-lg md:text-xl lg:text-3xl hover:underline" 
                        href="#about">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li class="mb-4"> <a class="text-green-500 hover:text-green-700 uppercase text-lg md:text-xl lg:text-3xl hover:underline" 
                        href="#contact">
                        {{ __('Contact') }}
                    </a>
                </li>
            </ul>
        </div>

        <a class="navbar-burger self-center mr-8 md:hidden" href="#">
            <svg width="20" height="12" viewbox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 2H19C19.2652 2 19.5196 1.89464 19.7071 1.70711C19.8946 1.51957 20 1.26522 20 1C20 0.734784 19.8946 0.48043 19.7071 0.292893C19.5196 0.105357 19.2652 0 19 0H1C0.734784 0 0.48043 0.105357 0.292893 0.292893C0.105357 0.48043 0 0.734784 0 1C0 1.26522 0.105357 1.51957 0.292893 1.70711C0.48043 1.89464 0.734784 2 1 2ZM19 10H1C0.734784 10 0.48043 10.1054 0.292893 10.2929C0.105357 10.4804 0 10.7348 0 11C0 11.2652 0.105357 11.5196 0.292893 11.7071C0.48043 11.8946 0.734784 12 1 12H19C19.2652 12 19.5196 11.8946 19.7071 11.7071C19.8946 11.5196 20 11.2652 20 11C20 10.7348 19.8946 10.4804 19.7071 10.2929C19.5196 10.1054 19.2652 10 19 10ZM19 5H1C0.734784 5 0.48043 5.10536 0.292893 5.29289C0.105357 5.48043 0 5.73478 0 6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7H19C19.2652 7 19.5196 6.89464 19.7071 6.70711C19.8946 6.51957 20 6.26522 20 6C20 5.73478 19.8946 5.48043 19.7071 5.29289C19.5196 5.10536 19.2652 5 19 5Z"
                    fill="#8594A5"></path>
            </svg>
        </a>
    </header>
</div>
<div class="hidden navbar-menu fixed top-0 left-0 bottom-0 w-5/6 max-w-sm z-50">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="relative flex flex-col py-6 px-6 w-full h-full bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-2">
            <a class="mr-auto lg:text-3xl sm:text-xl font-bold font-heading" href="{{ route('front.index') }}">
                <img class="w-auto h-10" src="{{ asset('images/' . settings()->site_logo) }}"
                    alt="{{ settings()->site_title }}" loading="lazy" />
            </a>
            <button class="navbar-close">
                <svg class="h-2 w-2 text-gray-500 cursor-pointer" width="10" height="10" viewbox="0 0 10 10"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.00002 1L1 9.00002M1.00003 1L9.00005 9.00002" stroke="black" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </div>
        <div class="border-t border-gray-900 py-2"></div>

        <ul class="lg:text-3xl sm:text-xl space-y-4 font-bold font-heading">
            <li class="hover:text-green-500 focus:text-green-500 hover:underline">
                <a href="#digital">
                    {{ __('The Digital Hub') }}
                </a>
            </li>
            <li class="hover:text-green-500 focus:text-green-500 hover:underline">
                <a href="startup">
                    {{ __('The Startup Hub') }}
                </a>
            </li>
            <li class="hover:text-green-500 focus:text-green-500 hover:underline">
                <a href="#partners">
                    {{ __('Partners') }}
                </a>
            </li>
            <li class="hover:text-green-500 focus:text-green-500 hover:underline">
                <a href="#about">
                    {{ __('About Us') }}
                </a>
            </li>
            <li class="hover:text-green-500 focus:text-green-500 hover:underline">
                <a href="#contact">
                    {{ __('Contact') }}
                </a>
            </li>
        </ul>

        <div class="border-t border-gray-900 mt-6 py-2"></div>

        <div class="flex justify-between">
            @if (Auth::check())
                <div class="w-full lg:text-3xl sm:text-xl font-bold font-heading">
                    <div class="py-3">
                        <a href="#" class="hover:text-red-500">
                            {{ Auth::user()->name }}
                        </a>
                    </div>
                    @if (Auth::user()->isAdmin())
                        <div class="py-3">
                            <a class="hover:text-red-500" href="{{ route('admin.dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </div>
                        <div class="py-3">
                            <a class="hover:text-red-500" href="{{ route('admin.settings.index') }} ">
                                {{ __('Settings') }}
                            </a>
                        </div>
                    @else
                        <div class="py-3">
                            <a class="hover:text-red-500" href="{{ route('front.myaccount') }}">
                                {{ __('My account') }}
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <div class="border-t border-gray-900 py-2"></div>
                <div class="w-full lg:text-3xl sm:text-xl font-bold font-heading">
                    <div class="py-3">
                        <a class="hover:text-red-500" href="{{ route('auth') }}">{{ __('Login') }} </a>
                    </div>
                    {{ __('or') }}
                    <div class="py-3">
                        <a class="hover:text-red-500" href="{{ route('auth') }}"> {{ __('Register') }}</a>
                    </div>
                </div>
            @endif
        </div>
    </nav>
</div>

@push('scripts')
    <script>
        // Burger menus
        document.addEventListener('DOMContentLoaded', function() {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }


        });
    </script>
@endpush
