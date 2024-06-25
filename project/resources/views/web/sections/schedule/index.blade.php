<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
    @include('web.layout.admin.header')


    @foreach ($categories as $item)

        @if(Auth::guard('patient')->user())
        <a href="{{route('schedule.edit', $item->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$item->name}}</a>
        @elseif(Auth::check())
        <a href="{{route('schedule.edit', $item->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$item->name}}</a>
        @else
            <a href="#"data-ripple-light="true" data-dialog-target="DeleteDialog{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$item->name}}</a>
                <div data-dialog-backdrop="DeleteDialog{{$item->id}}" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                    <div data-dialog="DeleteDialog{{$item->id}}" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Для записи на прием необходимо зарегистрироваться</h3>
                                <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Закрыть</button>
                                <a type="button" href="{{route('patient.register')}}" data-ripple-light="true" data-dialog-close="true" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Хорошо</a>                                </div>
                        </div>
                    </div>
                </div>
        @endif
    @endforeach


    @include('web.layout.admin.footer')
</body>

</html>
