<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Record;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function index(){
        $patientId = Auth::guard('patient')->user()->id;
//  dd(Carbon::now()->timezone('Asia/Irkutsk'));
        $records = Record::where('patient_id',$patientId)->get();
            
        return view("web.sections.record.index", ['records' => $records]);
    }

    public function show(Request $request){

        $searchQuery = $request->input('searchRecordDoctor');

        if($searchQuery !== NULL){
            $records = Record::where('date', 'like', "%{$searchQuery}%")
                ->orWhere('time', 'like', "%{$searchQuery}%")
                ->orWhereHas('patient', function ($query) use ($searchQuery) {
                    $query->where('last_name', 'like', "%{$searchQuery}%")

                    ->orWhere('first_name', 'like', "%{$searchQuery}%")
                    ->orWhere('father_name', 'like', "%{$searchQuery}%")
                    ->orWhere('date_of_birth', 'like', "%{$searchQuery}%")
                    ->orWhere('snils', 'like', "%{$searchQuery}%")
                    ->orWhere('email', 'like', "%{$searchQuery}%")
                    ->orWhere('phone', 'like', "%{$searchQuery}%");
                })
                // ->orWhereHas('schedule', function ($query) use ($searchQuery) {
                //     $query->orWhereHas('user', function ($query) use ($searchQuery){
                //         $query->where('last_name', 'like', "%{$searchQuery}%")
                //         ->orWhere('first_name', 'like', "%{$searchQuery}%")
                //         ->orWhere('father_name', 'like', "%{$searchQuery}%")
                //         ->orWhereHas('specializations', function ($query) use ($searchQuery){
                //                 $query->where('name');
                //         });
                //     });
                // })
                ->paginate(10);
        }else{
            $records = Record::paginate(10);
        }

        return view("web.sections.record.show", ['records' => $records]);
    }
    public function store(Request $request){
        $recordCheckDateTime = Record::where('date', $request->date)
            ->where('time', $request->time)->first();
        $recordCheckDoctor = Record::where('schedule_id', $request->schedule_id)
            ->where('date', $request->date)
            ->where('patient_id', Auth::guard('patient')->user()->id)->first();
        if($recordCheckDoctor === NULL){
            if($recordCheckDateTime === NULL){
                Record::create([
                    'schedule_id' => $request->schedule_id,
                    'patient_id' => $request->patient_id,
                    'date' => $request->date,
                    'time' => $request->time,
                    'status' => 0,
                ]);
                session()->flash('status', 'Вы успешно записались на прием');
                return redirect()->route('record.index');
            }else{
                session(['error'=>'Данное время приема занято.']);
                return redirect()->back();
            }
        }else{
            session(['error'=>'У вас уже существует запись на выбранную дату.']);
            return redirect()->back();
        }

    }
    public function create(Request $request, string $id){
        $schedule = Schedule::find($request->id);
        $doctors = User::where('role', 1)->get();
        $collection = collect($schedule->start_work);
        $start_work = $schedule->start_work;
        $time = Carbon::parse($schedule->time_of_receipt)->format('i');
//        dd($time);
        $end_work = Carbon::parse($schedule->end_work)->format('H:i:s');
        while($start_work != $end_work){
            $start_work = Carbon::parse($start_work)->addMinutes($time)->format('H:i:s');
            $collection->push($start_work);
        }
        $patient = Auth::guard('patient')->user()->id;
        $records = Record::where('schedule_id', $request->id)->get();
        foreach ($records as $item){
            foreach ($collection as $it){
                if($item->time === $it){
                    $collection = $collection->diff(collect([$item->time]));
                }
            }
        }
//        dd($collection);
        return view("web.sections.record.create", ['schedule' => $schedule, 'doctors' => $doctors, 'patient' => $patient, 'records' => $records, 'collection'=>$collection]);
    }
    public function edit(Request $request, string $id){

    }
    public function update(){

    }
    public function destroy(Request $request,){
        $dateNow = Carbon::now()->timezone('Asia/Irkutsk');
        $record = Record::find($request->id);

        if(Carbon::parse($record->date)->subDays(3)->format('Y-m-d') > $dateNow->format('Y-m-d')){
            $record->delete();
            session()->flash('status', 'Запись на прием успешно отменена.');
            return redirect()->route('record.index');
        }else{
            session(['error'=>'Нельзя отменить запись менее чем за 3 рабочих дня.']);
            return redirect()->route('record.index');
        }
    }
}
