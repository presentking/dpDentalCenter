<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RerocrdAdminController extends Controller
{
    public function index(Request $request){
        $searchQuery = $request->input('searchRecord');

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
        return view("web.sections.record.admin.index", ['records'=>$records]);
    }
    public function create(Request $request){

    }
    public function store(Request $request){

    }
    public function show(){

    }
    public function edit(Request $request){
        $status = Record::find($request->id);
        $status->update(['status'=>$request->status]);
        session()->flash('status', 'Статус успешно обновлен');
        return redirect()->back();
    }
    public function update(){

    }
    public function destroy(Request $request){
        $record = Record::find($request->id);
        $record->delete();
        session()->flash('status', 'Запись на прием успешно удалена.');
        return redirect()->back();
    }
}
