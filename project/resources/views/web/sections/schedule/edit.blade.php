<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
    @include('web.layout.admin.header')
    <div class="flex flex-wrap items-stretch justify-center">
            @foreach ($users as $user)
                @foreach($user->specializations as $it)
                    @if($it->id === $specUser->id)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg my-3 mx-2 max-h-15 ">
                        <img class="w-full" src="{{ asset("storage/img/{$user->path_img}") }}" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $user->last_name }} {{ $user->first_name }}
                                {{ $user->father_name }}</div>
                            <p class="text-gray-700 text-base">
                                Опыт работы: {{ $user->work_experience }}.
                            </p>
                            <p class="text-gray-700 text-base">
                                Образование: {{ $user->education }}.
                            </p>

                            <p class="text-gray-700 text-base">
                                Специализация:
                                @if($loop->last)
                                    {{$it->name}}.
                                @else
                                    {{$it->name}},
                                @endif
                            </p>
                            <p class="mt-4">
                                <a href="{{route('schedule.store', $user->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline  ">Посмотреть расписание</a>
                            </p>

                        </div>
                    </div>
                    @endif
                @endforeach
            @endforeach
    </div>
    @include('web.layout.admin.footer')
</body>

</html>
