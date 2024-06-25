<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.layout.admin.head')
</head>
<body>
    @include('web.layout.admin.header')

    <div class="m-8 flex flex-wrap justify-center">
        @foreach($specializations as $item)
            <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-8">
                @if(Auth::guard('patient')->user())
                    <a href="{{route('schedule.edit', $item->id)}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                @elseif(Auth::check())
                    <a href="{{route('schedule.edit', $item->id)}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                @else
                    <a href="#" data-ripple-light="true" data-dialog-target="DeleteDialog{{$item->id}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div data-dialog-backdrop="DeleteDialog{{$item->id}}" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                        <div data-dialog="DeleteDialog{{$item->id}}" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Для записи на прием необходимо зарегистрироваться</h3>
                                    <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Закрыть</button>
                                    <button type="button" data-ripple-light="true" data-dialog-close="true" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Хорошо</button>                                </div>
                            </div>
                        </div>
                    </div>

                @endif
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$item->name}}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$item->description}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @include('web.layout.admin.footer')
</body>
</html>





