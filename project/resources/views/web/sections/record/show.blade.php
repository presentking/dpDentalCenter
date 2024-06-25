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
<div class="m-2">
    <form class="max-w-md mx-auto" action="{{route('record.show')}}" method="get">
        <label for="searchRecordDoctor" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <input type="search" id="searchRecordDoctor" name="searchRecordDoctor" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск..." {{ old('search') }}  />
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
                    Исполняющий врач
                </th>
                <th scope="col" class="px-6 py-3">
                    Специализация
                </th>
                <th scope="col" class="px-6 py-3">
                    ФИО пациента
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
            </tr>
            </thead>
            <tbody>
            @foreach($records as $item)
                @if($item->schedule->user->id === Auth::user()->id)
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
                                        <option value="1">Не пришел на запись</option>
                                        <option value="0">Записан, не было приема</option>
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
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('web.layout.admin.footer')
</body>
</html>
