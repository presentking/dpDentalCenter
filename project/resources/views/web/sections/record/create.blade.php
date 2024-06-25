@inject('carbon', 'Carbon\Carbon')
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
    <form class="max-w-sm mx-auto" action="{{route('record.store')}}" method="POST">
        @csrf
        <h1>Форма заявки на прием</h1>
        <div class="mb-5">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выбор врача</label>
            <input type="text" id="" name="" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$schedule->user->last_name}} {{$schedule->user->first_name}} {{$schedule->user->father_name}}" disabled>
            <input type="text" id="schedule_id" name="schedule_id" value="{{$schedule->id}}" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 hidden" >
        </div>
        @error('schedule_id')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Дата</label>
            <input type="date" id="" name="" value="{{$schedule->date}}" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  disabled>
            <input type="text" id="date" name="date" value="{{$schedule->date}}" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 hidden" >
        </div>
        @error('date')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
        <div class="mb-5">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email пациента</label>
            <input type="text" id="" name="" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::guard('patient')->user()->email}}" disabled>
            <input type="text" id="patient_id" name="patient_id" value="{{Auth::guard('patient')->user()->id}}" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 hidden" >
        </div>
        @error('patient_id')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
        <div class="mb-5">
            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Время</label>
            <select id="time" name="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($collection as $item)
                    <option value="{{$item}}">{{$carbon::parse($item)->format('H:i')}}</option>
                @endforeach
            </select>
        </div>
        @error('time')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Записаться на прием</button>
    </form>




    @include('web.layout.admin.footer')
</body>

</html>
