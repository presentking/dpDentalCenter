<header>
<nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-6" aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>

        </a>
    </div>
    <div class="flex lg:hidden">
        <button type="button" class="btn-main-menu text-black bg-white rounded-md p-2.5 inline-flex items-center justify-center">
            <!-- Use a more semantic element for the button text -->
            <span class="visually-hidden">Открыть главное меню</span>
            <!-- Simplify the SVG classes using Tailwind's utility-first approach -->
            <svg class="h-6 w-6 stroke-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Главная страница</a>
            <a href="{{route('user.show')}}" class="text-sm font-semibold leading-6 text-gray-900">Врачи</a>
            <a href="{{route('service.show')}}" class="text-sm font-semibold leading-6 text-gray-900">Услуги</a>
            <a href="{{route('schedule.index')}}" class="text-sm font-semibold leading-6 text-gray-900">Расписание</a>
    </div>

    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if((Auth::guard('patient')->user()))
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <button data-ripple-light="false" data-popover-target="menu" class="select-none rounded-lg bg-white py-3 px-6 text-center align-middle font-sans text-xs font-bold text-black shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Вы авторизированы: {{Auth::guard('patient')->user()->email}}
                </button>
                <ul role="menu" data-popover="menu" data-popover-placement="bottom"
                    class="absolute z-10 min-w-[180px] overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
                    <a  href="{{route('record.index')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                        Личный кабинет
                    </a>
                    <form method="POST" action="{{ route('patient.logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Выйти из аккаунта') }}
                        </x-dropdown-link>
                    </form>
                </ul>
            </div>
        @elseif(Auth::check())
            @if(Auth::user()->role == 2)
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <button data-ripple-light="false" data-popover-target="menu" class="select-none rounded-lg bg-white py-3 px-6 text-center align-middle font-sans text-xs font-bold text-black shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Вы авторизированы: {{Auth::user()->email}}
                    </button>
                    <ul role="menu" data-popover="menu" data-popover-placement="bottom"
                        class="absolute z-10 min-w-[180px] overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
                        <a href="/profile" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Личный кабинет
                        </a>
                        <a href="{{route('record.admin.index')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Все записи на приём
                        </a>
                        <a href="{{route('patient.show')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Пациенты
                        </a>
                        <a href="{{route('user.index')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Врачи
                        </a>
                        <a href="{{route('service.index')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Услуги
                        </a>
                        <a href="{{route('specialization.index')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Категории
                        </a>
                    </ul>
                </div>
            @elseif(Auth::user()->role == 1)
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <button data-ripple-light="false" data-popover-target="menu" class="select-none rounded-lg bg-white py-3 px-6 text-center align-middle font-sans text-xs font-bold text-black shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Вы авторизированы: {{Auth::user()->email}}
                    </button>
                    <ul role="menu" data-popover="menu" data-popover-placement="bottom"
                        class="absolute z-10 min-w-[180px] overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
                        <a href="/profile" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Личный кабинет
                        </a>
                        <a  href="{{route('record.show')}}" role="menuitem" class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            Мои записи
                        </a>
                    </ul>
                </div>
            @endif
        @else
            <div class="mr-2"><a href="{{route('patient.login')}}" class="text-sm font-semibold leading-6 text-gray-900">Вход </a></div>
            <div class="mr-2"><a href="{{route('patient.register')}}" class="text-sm font-semibold leading-6 text-gray-900">Регистрация</a></div>
            <div class="mr-2"><a href="{{route('login')}}" class="text-sm font-semibold leading-6 text-gray-900 mx-2">Лк врачей</a></div>
        @endif
    </div>
    <!-- from node_modules -->
    <script type="module" src="node_modules/@material-tailwind/html@latest/scripts/popover.js"></script>

    <!-- from cdn -->
    <script type="module" src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"></script>
</nav>
</header>
