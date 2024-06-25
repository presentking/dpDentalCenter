<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\SpecializationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Relay\Event;
use Carbon\Carbon;
class ScheduleController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $users = User::where('role', 1);
        $categories = Specialization::all();
        $schedule = Schedule::all();
        return view("web.sections.schedule.index", ['schedule' => $schedule, 'users' => $users, 'categories' => $categories, ]);

    }

    public function show(Request $request, string $id)
    {
        return view("web.sections.schedule.show");
    }
    public function store(Request $request, string $id)
    {

        $doctor = User::find($id);
        $schedule = Schedule::where('user_id', $id)->oldest('date')->get();
        
        $date = Carbon::now()->timezone('Asia/Irkutsk');
        $month  = Carbon::now()->addMonth()->timezone('Asia/Irkutsk')->format('m');
        $lastDate = Carbon::now()->month($month)->endOfMonth();
        $collection = collect();
        $timeOfReceipt = collect();
        $calendarCol = collect();
        foreach ($schedule as $item){
            $dateParse = Carbon::parse($item->date)->format('Y-m-d');
            $start_work = Carbon::parse("$item->date $item->start_work")->format('H:i');
            $end_work = Carbon::parse("$item->date $item->end_work")->format('H:i');
            $collection->push($dateParse);
            
        }
//        dd($schedule);
        $tempDate = $date->subDay($date->isoWeekday());
        //Формирование месяца в календаре
        while($tempDate<=$lastDate){
            $calendarCol->push($tempDate->addDay()->format('Y-m-d'));
        }

        //Формирование промежуетков приема

        return view("web.sections.schedule.store", ['doctor'=>$doctor, 'schedule'=> $schedule, 'date'=>$date, 'tempDate' => $tempDate, 'start_work'=>$start_work, 'end_work' => $end_work, 'dateParse' => $dateParse, 'collection' => $collection, 'calendarCol'=>$calendarCol]);
    }
    public function create(Request $request)
    {


        $patients = Patient::insert([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'father_name' => $request->father_name,
            'phone' => $request->phone,
        ]);


        return redirect()->route('schedule.index');
    }
    public function edit(Request $request, string $id)
    {
        $specUser = Specialization::find($id);
        $users = User::where('role', 1)->get();
        $col = collect();

        return view("web.sections.schedule.edit", ['specUser' => $specUser, 'users' => $users]);
    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
