<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleAdminController extends Controller
{
    public function index(){

    }
    public function create(Request $request){
        $schedule = Schedule::where('user_id', $request->id)->get();
        $doctor = User::find($request->id);
        return view("web.sections.schedule.admin.create",['schedule' => $schedule, 'doctor'=>$doctor]);
    }
    public function store(Request $request){
//        dd($request->all());
        $dateNow = Carbon::now();
        $scheduleCheck = Schedule::where('user_id', $request->id)
            ->where('date', $request->date)->first();

        if($scheduleCheck === NULL){
            if($request->date > $dateNow->addWeek()->format('Y-m-d')){
//                dd($request->all());
                $request->validate([
                   'date' => 'required|date',
                   'start_work' => 'required',
                   'end_work' => 'required',
                   'time_of_receipt' => 'required',

                ]);

                Schedule::create([
                    'date' => $request->date,
                    'start_work' => $request->start_work,
                    'end_work' => $request->end_work,
                    'time_of_receipt' => $request->time_of_receipt,
                    'user_id' => $request->id
                ]);
                session()->flash('status', 'Расписание успешо создано');
                return redirect()->route('schedule.store', $request->id);
            }else{
                session(['error'=>'Нельзя создавать расписание не раньше недели вперед']);
                return redirect()->route('schedule.admin.create', $request->id)->withInput();
            }
        }else{
            session(['error'=>'Данное расписание уже существует.']);
            return redirect()->route('schedule.admin.create', $request->id)->withInput();
        }
    }
    public function show(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
}
