<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
    @include('web.layout.admin.header')
    <div class="flex flex-wrap items-stretch justify-center">
        <form class="max-w-md mx-auto w-full" action="{{route('user.show')}}" method="get">
            <label for="searchUserShow" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative ">
                <input type="search" id="searchUserShow" name="searchUserShow" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск..." {{ old('search') }}  />
                <button type="submit" class="text-white absolute right-0 mr-2 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Найти</button>
            </div>
        </form>
    </div>
    <div class="flex flex-wrap items-stretch justify-center">
        @foreach ($doctors as $item)
            <div class="max-w-sm rounded overflow-hidden shadow-lg my-3 mx-2 max-h-15 ">
                <img class="w-full" src="{{ asset("storage/img/{$item->path_img}") }}" alt="Sunset in the mountains">
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
                        <a href="{{route('schedule.store', $item->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline  ">Посмотреть расписание</a>
                    </p>
                </div>

            </div>
        @endforeach
    </div>
    @include('web.layout.admin.footer')
</body>

</html>
