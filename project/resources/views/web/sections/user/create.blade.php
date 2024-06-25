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

<form class="max-w-sm mx-auto" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почта</label>
        <input type="email" value="{{old('email')}}" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
    </div>
        @error('email')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
        <input type="password" value="{{old('password')}}" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
        @error('password')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
        <input type="text" value="{{old('last_name')}}" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
        @error('last_name')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
        <input type="text" value="{{old('first_name')}}" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
        @error('first_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
        <input type="text" value="{{old('father_name')}}" id="father_name" name="father_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
        @error('father_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="number_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер телефона</label>
        <input type="number" value="{{old('number_phone')}}" id="number_phone" name="number_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>

        @error('number_phone')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror

    <div class="mb-2">
        <label for="work_experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Опыт работы</label>
        <textarea rows="4" id="work_experience" name="work_experience" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{old('work_experience')}}</textarea>
    </div>
        @error('work_experience')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="education" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Образование</label>
        <textarea rows="4" id="education" name="education" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{old('education')}}</textarea>
    </div>
        @error('education')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <div class="mb-2">
            <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Дата рождения</label>
            <input type="date" value="{{old('date_of_birth')}}" id="date_of_birth" name="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="yyyy.mm.dd" required />
        </div>
    </div>
        @error('date_of_birth')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label for="residence_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Адрес проживания</label>
        <input type="text" value="{{old('residence_address')}}" id="residence_address" name="residence_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
        @error('residence_address')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <div class="mb-2">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="path_img">Фотография</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="path_img" name="path_img" type="file">
    </div>

        @error('path_img')
            <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Создать врача</button>
</form>


@include('web.layout.admin.footer')
</body>

</html>
