@inject('carbon', 'Carbon\Carbon')
<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
    @include('web.layout.admin.header')

    <div class="container size-1.5">
        <div class="flex justify-center">
        <h1 >Расписание врача: {{$doctor->last_name}} {{$doctor->first_name}} {{$doctor->father_name}}
            Специализация:
            @foreach($doctor->specializations as $item)
                {{$item->name}}
            @endforeach
        </h1>
        </div>

        <!-- component -->
        <div class="ml-12">
        <div class="lg:flex lg:h-full lg:flex-col z-0">
            <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
                <h1 class="text-base font-semibold leading-6 text-gray-900">
                    <time datetime="2022-01">

                        @if(date('m') == 01)
                            Январь
                        @elseif(date('m') == 02)
                            Февраль
                        @elseif(date('m' ) == 03)
                            Март
                        @elseif(date('m') == 04)
                            Апрель
                        @elseif(date('m') == 05)
                            Май
                        @elseif(date('m') == 06)
                            Июнь
                        @elseif(date('m') == 07)
                            Июль
                        @elseif(date('m') == 8)
                            Август
                        @elseif(date('m') == 9)
                            Сентябрь
                        @elseif(date('m') == 10)
                            Октябрь
                        @elseif(date('m') == 11)
                            Ноябрь
                        @elseif(date('m') == 12)
                            Декабрь
                        @endif
                        {{ date('Y') }}</time>
                </h1>
                <div class="flex items-center">
                    <div class="hidden md:ml-4 md:flex md:items-center">
                        <div class="ml-6 h-6 w-px bg-gray-300"></div>
                        @if(Auth::check())
                            @if(Auth::user()->role == 2)
                                <a href="{{route('schedule.admin.create',$doctor->id)}}" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Добавить расписание</a>
                           @endif
                        @endif
                    </div>
                    <div class="relative ml-6 md:hidden">
                        <button type="button" class="-mx-2 flex items-center rounded-full border border-transparent p-2 text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>
            <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
                <div class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
                    <div class="flex justify-center bg-white py-2">
                        <span>Понедельник</span>
                    </div>
                    <div class="flex justify-center bg-white py-2">
                        <span>Вторник</span>
                    </div>
                    <div class="flex justify-center bg-white py-2">
                        <span>Среда</span>
                    </div>
                    <div class="flex justify-center bg-white py-2">
                        <span>Четверг</span>
                    </div>
                    <div class="flex justify-center bg-white py-2">
                        <span>Пятница</span>
                    </div>
                    <div class="flex justify-center bg-white py-2">
                        <span>Суббота</span>
                    </div>
                    <div class="flex justify-center bg-white py-2">
                        <span>Воскресенье</span>
                    </div>
                </div>

                <div class="flex bg-gray-200 text-xs leading-6 text-gray-700 lg:flex-auto">
                    <div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-3 lg:gap-px">
                            @foreach($calendarCol as $item)
                                <div class="relative bg-white px-3 py-2 text-gray-500 z-0">
                                    <div class="float-right h-32">
                                        <time datetime="#" >{{$item}}</time>
                                    </div>
                                    <div class="float-none h-32">
                                        @foreach($schedule as $it)
                                            @if($carbon::parse($it->date)->format('Y-m-d') == $item )
                                                <ol class="mt-4">
                                                    <li>
                                                        @if($item < $carbon::now()->timezone('Asia/Irkutsk')->addDays(2)->format('Y-m-d'))

                                                        @else
                                                            @if(Auth::guard('patient')->user())
                                                                <a href="{{route('record.create', $it->id)}}" class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600 absolute bottom-0 right-4">
                                                                    {{$carbon::parse($it->start_work)->format('H:i')}}-{{$carbon::parse($it->end_work)->format('H:i')}}
                                                                </a>
                                                            @elseif(Auth::user())
                                                                <a href="#" class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600 absolute bottom-0 right-4">
                                                                    {{$carbon::parse($it->start_work)->format('H:i')}}-{{$carbon::parse($it->end_work)->format('H:i')}}s
                                                                </a>
                                                            @else
                                                                <a href="#" class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600 absolute bottom-0 right-4">
                                                                    {{$carbon::parse($it->start_work)->format('H:i')}}-{{$carbon::parse($it->end_work)->format('H:i')}}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </li>
                                                </ol>
                                                @php
                                                    $schedule = $schedule->diff(collect([$it]));
                                                @endphp
                                                @continue
                                            @else

                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('web.layout.admin.footer')
</body>
</html>
