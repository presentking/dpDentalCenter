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
<div class="flex flex-wrap items-stretch justify-center">
    <button type="button" data-ripple-light="true" data-dialog-target="dialog" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Добавить пациента</button>
</div>
<div class="flex flex-wrap items-stretch justify-center">
    <form class="max-w-md mx-auto w-full" action="{{route('patient.show')}}" method="get">
        <label for="searchPatient" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative ">
            <input type="search" id="searchPatient" name="searchPatient" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск..." {{ old('search') }}  />
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
                    id пациента
                </th>
                <th scope="col" class="px-6 py-3">
                    Почта пациента
                </th>
                <th scope="col" class="px-6 py-3">
                    Снилс
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата рождения
                </th>
                <th scope="col" class="px-6 py-3">
                    ФИО
                </th>
                <th scope="col" class="px-6 py-3">
                    Номер телефона пациента
                </th>
                <th scope="col" class="flex justify-center px-6 py-3">
                    Действие
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->snils}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->date_of_birth}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->last_name}}
                        {{$item->first_name}}
                        {{$item->father_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->phone}}
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" data-ripple-light="true" data-dialog-target="UpdateDialog{{$item->id}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Редактировать</button>
                        <div data-dialog-backdrop="UpdateDialog{{$item->id}}" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                            <div data-dialog="UpdateDialog{{$item->id}}" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                                <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                                    Изменение данных пациента
                                </div>
                                <div class="relative p-4 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                                    <form class="max-w-sm mx-auto" action="{{route('patient.edit', $item->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="mb-5">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почта</label>
                                            <input type="text" id="email" name="email" value="{{$item->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('email')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
                                            <input type="password" id="password" name="password" value="{{$item->password}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('password')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Снилс</label>
                                            <input type="text" id="snils" name="snils" value="{{$item->snils}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('snils')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Дата рождения</label>
                                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{$item->date_of_birth}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('date_of_birth')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
                                            <input type="text" id="last_name" name="last_name" value="{{$item->last_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('last_name')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                                            <input type="text" id="first_name" name="first_name" value="{{$item->first_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('first_name')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
                                            <input type="text" id="father_name" name="father_name" value="{{$item->father_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('father_name')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-5">
                                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Контактный телефон</label>
                                            <input type="text" id="phone" name="phone" value="{{$item->phone}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        @error('phone')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                        <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
                                            <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5  px-5 m-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Закрыть</button>
                                            <button type="submit" data-ripple-light="true" data-dialog-close="true" class="middle none center rounded-lg bg-gradient-to-tr from-green-600 to-green-400 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                Изменить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-ripple-light="true" data-dialog-target="DeleteDialog{{$item->id}}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Удалить</button>
                        {{--DELETE MODAL!--}}
                        <div data-dialog-backdrop="DeleteDialog{{$item->id}}" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                            <div data-dialog="DeleteDialog{{$item->id}}" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <form action="{{route('patient.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Вы действительно хотите удалить пациента {{$item->last_name}} {{$item->first_name}} {{$item->father_name}}?</h3>
                                            <button type="submit" data-ripple-light="true" data-dialog-close="true" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Даа</button>
                                            <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Нет, закрыть</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--CREATE MODAL!--}}
<div data-dialog-backdrop="dialog" data-dialog-backdrop-close="true" class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
    <div data-dialog="dialog" class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
        <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
            Добавление пациента
        </div>
        <div class="relative p-4 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
            <form class="max-w-sm mx-auto" action="{{route('patient.admin.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почта</label>
                    <input type="text" id="email" name="email" value="{{old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('email')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('password')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="snils" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Снилс</label>
                    <input type="number" id="snils" name="snils" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('snils')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
                    <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('last_name')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                    <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('first_name')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
                    <input type="text" id="father_name" name="father_name" value="{{old('father_name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('father_name')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Контактный телефон</label>
                    <input type="number" id="phone" name="phone" value="{{old('phone')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                @error('phone')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
                    <button data-ripple-dark="true" data-dialog-close="true" type="button" class="py-2.5  px-5 m-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Закрыть</button>
                    <button type="submit" data-ripple-light="true" data-dialog-close="true" class="middle none center rounded-lg bg-gradient-to-tr from-green-600 to-green-400 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Добавить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    {{ $patients->links() }}
</div>
@include('web.layout.admin.footer')
</body>
</html>
