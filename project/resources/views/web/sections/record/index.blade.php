@inject('carbon', 'Carbon\Carbon')
<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
    @include('web.layout.admin.header')
    @if (session()->has('status'))
        <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
            {{ session()->pull('status') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
            {{ session()->pull('error') }}
        </div>

    @endif
    <h1 class="ml-6 text-2xl font-medium tracking-tight text-gray-900 dark:text-white">Личный кабинет {{Auth::guard('patient')->user()->email}}</h1>
{{--    <div class="flex flex-row">--}}
        <form class="max-w-sm mx-auto" action="{{route('patient.edit', Auth::guard('patient')->user()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почта</label>
                <input type="email" id="email" name="email" value="{{Auth::guard('patient')->user()->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
            </div>
            @error('email')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
                <input type="password" id="password" name="password" value="{{Auth::guard('patient')->user()->password}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                <input type="text" id="snils" name="snils" value="{{Auth::guard('patient')->user()->snils}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 hidden" required />
            </div>
            @error('password')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
                <input type="text" id="last_name" name="last_name" value="{{Auth::guard('patient')->user()->last_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            @error('last_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                <input type="text" id="first_name" name="first_name" value="{{Auth::guard('patient')->user()->first_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            @error('first_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
                <input type="text" id="father_name" name="father_name" value="{{Auth::guard('patient')->user()->father_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            @error('father_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
            <div class="mb-2">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер телефона</label>
                <input type="number" id="phone" name="phone" value="{{Auth::guard('patient')->user()->phone}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            @error('phone')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Обновить данные</button>
        </form>
        <div class="m-8 flex flex-wrap justify-center">
            @foreach($records as $item)
                <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-8">
                    <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$item->schedule->user->last_name}} {{$item->schedule->user->first_name}} {{$item->schedule->user->father_name}}</h5>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">

                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> Специализация врача @foreach($item->schedule->user->specializations as $it)
                                        {{$it->name}}
                                    @endforeach</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Дата {{$item->date}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Время {{$item->time}}</p>
                                @if($item->status == 0)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Статус: Записан, не было приема</p>
                                    @if($carbon::now()->timezone('Asia/Irkutsk')->addDays(3)->format('Y-m-d') < $carbon::parse($item->date)->format('Y-m-d'))
                                        <button type="button" data-ripple-light="true" data-dialog-target="DeleteDialog{{$item->id}}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Отменить запись</button>
                                        {{--DELETE MODAL!--}}
                                        <div data-dialog-backdrop="DeleteDialog{{$item->id}}" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                                            <div data-dialog="DeleteDialog{{$item->id}}" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <form action="{{route('record.admin.destroy', $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Вы действительно хотите отменить прием</h3>
                                                            <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Нет, закрыть</button>
                                                            <button type="submit" data-ripple-light="true" data-dialog-close="true" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Да</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else

                                    @endif
                                @elseif($item->status == 1)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Статус: Не пришел на запись</p>
                                @elseif($item->status == 2)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Статус: Завершено</p>
                                @elseif($item->status == 3)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Статус: В обработке</p>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
{{--    </div>--}}


    @include('web.layout.admin.footer')
</body>
</html>
