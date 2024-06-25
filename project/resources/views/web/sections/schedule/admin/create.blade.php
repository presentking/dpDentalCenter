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

<form class="max-w-sm mx-auto" action="{{route('schedule.admin.store', $doctor->id)}}" method="POST">
    @csrf
    <h1>Форма создания расписания</h1>

    <div class="mb-5">
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Врач</label>
        <input type="text" id="" name=""  aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$doctor->last_name}} {{$doctor->first_name}} {{$doctor->father_name}}" disabled>
    </div>
    <div class="mb-5">
        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Дата</label>
        <input type="date" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{old('date')}}"/>
    </div>
    <div class="mb-5">
        <label for="start_work" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Начало работы</label>
        <input type="time" id="start_work" name="start_work" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{old('start_work')}}"/>
    </div>
    <div class="mb-5">
        <label for="end_work" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Конец работы</label>
        <input type="time" id="end_work" name="end_work" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{old('end_work')}}"/>
    </div>
    <div class="mb-5">
        <label for="time_of_receipt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Время приема</label>
        <input type="time" id="time_of_receipt" name="time_of_receipt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{old('time_of_receipt')}}"/>
        <input type="text" id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 hidden" required value="{{$doctor->id}}"/>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Создать расписание</button>
</form>


@include('web.layout.admin.footer')
</body>

</html>
