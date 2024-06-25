@inject('carbon', 'Carbon\Carbon')
    <!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.admin.head')
</head>

<body>
@include('web.layout.admin.header')

<div class="m-2">
    <form class="max-w-md mx-auto" action="{{route('record.admin.index')}}" method="get">
        <label for="searchRecord" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <input type="search" id="searchRecord" name="searchRecord" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск..." {{ old('search') }}  />
            <button type="submit" class="text-white absolute right-0 mr-2 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Найти</button>
        </div>
    </form>
</div>
<div class="flex justify-center m-6">

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    № Записи
                </th>
                <th scope="col" class="px-6 py-3">
                    ФИО врача
                </th>
                <th scope="col" class="px-6 py-3">
                    Специализация
                </th>
                <th scope="col" class="px-6 py-3">
                    ФИО пациента
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата рождения пациента
                </th>
                <th scope="col" class="px-6 py-3">
                    Номер телефона пациента
                </th>
                <th scope="col" class="px-6 py-3">
                    Почта пациента
                </th>
                <th scope="col" class="px-6 py-3">
                    Снилс
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата и время
                </th>
                <th scope="col" class="px-6 py-3">
                    Статус записи
                </th>
                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->schedule->user->last_name}} {{$item->schedule->user->first_name}} {{$item->schedule->user->father_name}}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($item->schedule->user->specializations as $it)
                            @if($loop->last)
                                {{$it->name}}.
                            @else
                                {{$it->name}},
                            @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{$item->patient->last_name}}
                        {{$item->patient->first_name}}
                        {{$item->patient->father_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->patient->date_of_birth}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->patient->phone}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->patient->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->patient->snils}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->date}}
                        {{$item->time}}
                    </td>
                    <td class="px-6 py-4 flex">
                        <form class="max-w-sm mx-auto" action="{{route('record.admin.edit', $item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if($item->status == 0)
                                    <option value="0">Записан, не было приема</option>
                                    <option value="1">Не пришел на запись</option>
                                    <option value="2">Завершено</option>
                                    <option value="3">В обработке</option>
                                @elseif($item->status == 1)
                                    <option value="1">Не пришел на запись</option>
                                    <option value="2">Завершено</option>
                                    <option value="0">Записан, не было приема</option>
                                    <option value="3">В обработке</option>
                                @elseif($item->status == 2)
                                    <option value="2">Завершено</option>
                                    <option value="0">Записан, не было приема</option>
                                    <option value="1">Не пришел на запись</option>
                                    <option value="3">В обработке</option>
                                @elseif($item->status == 3)
                                    <option value="3">В обработке</option>
                                    <option value="2">Завершено</option>
                                    <option value="1">Не пришел на запись</option>
                                    <option value="0">Записан, не было приема</option>
                                @endif
                            </select>
                            <div class="ml-12 mt-4">
                                <button type="submit" class="m-50% text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Изменить</button>
                            </div>
                        </form>
                    </td>
                    <td class="px-6 py-4">
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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $records->links() }}


@include('web.layout.admin.footer')
</body>

</html>
