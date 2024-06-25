<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
@include('web.layout.admin.header')
@if (session()->has('error'))
    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
        {{ session()->pull('error') }}
    </div>

@endif
@if (session()->has('status'))
    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
        {{ session()->pull('status') }}
    </div>
@endif
    <div class="flex flex-wrap items-stretch justify-center">
        <a type="button" href="{{route('user.create')}}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Добавить врача</a>
    </div>
    <div class="flex flex-wrap items-stretch justify-center">
        <form class="max-w-md mx-auto w-full" action="{{route('user.index')}}" method="get">
            <label for="searchCabinet" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative ">
                <input type="search" id="searchUser" name="searchUser" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск..." {{ old('search') }}  />
                <button type="submit" class="text-white absolute right-0 mr-2 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Найти</button>
            </div>
        </form>
    </div>
<div class="flex flex-wrap items-stretch justify-center">

    @foreach ($doctors as $item)
        <div class="max-w-sm rounded overflow-hidden shadow-lg my-3 mx-2 max-h-15 ">
            <img class="w-full" src="{{ asset("storage/img/$item->path_img") }}" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $item->last_name }} {{ $item->first_name }}
                    {{ $item->father_name }}</div>
                <p class="text-gray-700 text-base">
                    Опыт работы: {{ $item->work_experience }}.
                </p>
                <p class="text-gray-700 text-base">
                    Образование: {{ $item->education }}.
                </p>
                <p class="text-gray-700 text-base">
                    Специализация:
                    @foreach($item->specializations as $it)
                        @if($loop->last)
                            {{$it->name}}.
                        @else
                            {{$it->name}},
                        @endif
                    @endforeach
                </p>

                <p class="mt-4">
                    <a href="{{route('user.edit',$item->id)}}" type="button"  class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Редактирование</a>
                    <button type="button" data-ripple-light="true" data-dialog-target="DeleteDialog{{$item->id}}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Удалить</button>
                    {{--DELETE MODAL!--}}
                    <div data-dialog-backdrop="DeleteDialog{{$item->id}}" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                        <div data-dialog="DeleteDialog{{$item->id}}" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <form action="{{route('user.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Вы действительно хотите удалить врача {{$item->last_name}} {{$item->first_name}} {{$item->father_name}}?</h3>
                                        <button type="submit" data-ripple-light="true" data-dialog-close="true" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Даа</button>
                                        <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Нет, закрыть</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </p>
                <p class="mt-4">

                </p>
            </div>

        </div>
    @endforeach
</div>
@include('web.layout.admin.footer')
</body>

</html>
