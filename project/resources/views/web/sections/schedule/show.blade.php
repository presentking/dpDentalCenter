<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.layout.user.head')
</head>

<body>
    @include('web.layout.admin.header')



    <form class="max-w-sm mx-auto" action="{{route('patient.create')}}" method="POST">
        @csrf
        <h1>Форма отправки заявки на прием</h1>
        <div class="mb-5">
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
            <input type="last_name" id="last_name" name="last_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required />
        </div>
        <div class="mb-5">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
            <input type="first_name" id="first_name" name="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required />
        </div>
        <div class="mb-5">
            <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
            <input type="father_name" id="father_name" name="father_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required />
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Контактный номер телефона</label>
            <input type="phone" id="phone" name="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>




    @include('web.layout.admin.footer')
</body>

</html>
