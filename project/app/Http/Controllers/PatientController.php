<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientUpdateRequest;
use App\Models\Cabinet;
use App\Models\Patient;
use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PatientController extends Controller
{
    public function index(){

    }
    public function create(){

    }
    public function store(Request $request){
        $dateNow = Carbon::now()->timezone('Asia/Irkutsk');
        $patientCheck = Patient::where('email', $request->email)->first();
        if(Carbon::parse($request->date_of_birth)->addYear(18)->format('Y-m-d') < $dateNow->format('Y-m-d')){
            if($patientCheck === NULL){
                $request->validate([
                    'email' => 'required|string|unique:patients|max:50',
                    'password' => 'required|min:5',
                    'snils' => 'required|unique:patients|max:20',
                    'date_of_birth' => 'required',
                    'last_name' => 'required|string|min:3|max:25',
                    'first_name' => 'required|string|min:3|max:25',
                    'father_name' => 'required|string|min:3|max:25',
                    'phone' => 'required|unique:patients|max:15',
                ]);
                Hash::make($request->password);
                Patient::create([
                    'email' => $request->email,
                    'password' => $request->password,
                    'snils' => $request->snils,
                    'date_of_birth' => $request->date_of_birth,
                    'last_name' => $request->last_name,
                    'first_name' => $request->first_name,
                    'father_name' => $request->father_name,
                    'phone' => $request->phone,
                ]);
                session()->flash('status', 'Пациент успешно создан.');
                return redirect()->route('patient.show');
            }else{
                session(['error'=>'Данный пользователь уже существует.']);
                return redirect()->route('patient.show')->withInput();
            }
        }else{
            session(['error'=>'Паицент не может быть моложе 18 лет.']);
            return redirect()->route('patient.show')->withInput();
        }

    }
    public function show(Request $request){

        if($request->filled('searchPatient')){
            $patients = Patient::search($request->searchPatient)->paginate(10);
        }else{
            $patients = Patient::paginate(10);
        }
        return view("web.sections.patient.show", ['patients' => $patients ]);
    }
    public function edit(Request $request){

        $patient = Patient::find($request->id);

            $request->validate([
               'email' => 'required|unique:patients,email,' . $patient->id,
               'password' => 'required',
               'last_name' => 'required|string|max:30',
               'first_name' => 'required|string|max:30',
               'father_name' => 'required|string|max:30',
                'phone' => 'required|numeric|min:0'
            ]);

            $passHash = Hash::make($request->password);
            $patient->update([
                'email' => $request->email,
                'password' => $request->password,
                'snils' => $request->snils,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'father_name' => $request->father_name,
                'phone' => $request->phone,
            ]);
            $patient->save();
            session()->flash('status', 'Личный профиль пациента изменен.');
            return redirect()->back();
    }
    public function update(PatientUpdateRequest $request){
        dd($request->all());
//        $patient = Auth::guard('patient')->user();
//        $patient->update($request->validated());
//        $patient->save();
        return Redirect::route('patient.index')->with('status', 'patient.update');
    }
    public function destroy(Request $request){
        $patient = Patient::find($request->id);
        $record = Record::where('patient_id', $patient->id)
            ->where('status', '0')
            ->orWhere('status', '1')
            ->orWhere('status', '3')
            ->first();
        $col = collect();
        if($record === null){
        $col->push($record);
        }else{
            $col = null;
        }
        if($col != NULL){
            $patient->delete();
            session()->flash('status', 'Пациент успешно удален.');
            return redirect()->route('patient.show');
        }else{
            session(['error'=> 'Нельзя удалить пациентов, у которых есть активные записи']);
            return redirect()->back();
        }

    }
}
