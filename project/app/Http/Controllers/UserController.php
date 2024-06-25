<?php

namespace App\Http\Controllers;
use App\Models\Record;
use App\Models\Schedule;
use App\Models\Specialization;
use App\Models\SpecializationUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
//        $doctors = User::select->where('role', 1)->get();
//        $spec = Specialization::all();
        $searchQuery = $request->input('searchUser');

        if($searchQuery !== NULL){
            $doctors = User::where('role',1 )
                ->where('last_name', 'like', "%{$searchQuery}%")
                ->orWhere('first_name', 'like', "%{$searchQuery}%")
                ->orWhere('father_name', 'like', "%{$searchQuery}%")
                ->orWhere('work_experience', 'like', "%{$searchQuery}%")
                ->orWhere('education', 'like', "%{$searchQuery}%")
                ->orWhereHas('specializations', function ($query) use ($searchQuery){
                    $query->where('name', 'like', "%{$searchQuery}%");
                })->get();
            $spec = Specialization::all();
        }else{
            $doctors = User::where('role', 1)->get();
            $spec = Specialization::all();
        }
        return view("web.sections.user.index",['doctors'=>$doctors, 'spec' => $spec]);
    }
    public function show(Request $request){
        $searchQuery = $request->input('searchUserShow');

        if($searchQuery !== NULL){
            $doctors = User::where('role',1 )
                ->where('last_name', 'like', "%{$searchQuery}%")
                ->orWhere('first_name', 'like', "%{$searchQuery}%")
                ->orWhere('father_name', 'like', "%{$searchQuery}%")
                ->orWhere('work_experience', 'like', "%{$searchQuery}%")
                ->orWhere('education', 'like', "%{$searchQuery}%")
                ->orWhereHas('specializations', function ($query) use ($searchQuery){
                    $query->where('name', 'like', "%{$searchQuery}%");
                })->get();
            $spec = Specialization::all();
        }else{
            $doctors = User::where('role', 1)->get();
            $spec = Specialization::all();
        }

        // return redirect()->route('doctors.show');
        return view("web.sections.user.show",['doctors'=>$doctors]);
    }
    public function store(Request $request){
        $dateNow = Carbon::now();


        $doctorsCheck = User::where('last_name', $request->last_name)
            ->where('first_name', $request->first_name)
            ->where('father_name', $request->father_name)->first();


//        dd($request->date_of_birth < $dateNow->subYears(18));
        if($doctorsCheck === NULL){
            if($request->date_of_birth < $dateNow->subYears(18)){
                $request->validate([
                    'email' => 'required|string|unique:users|max:50',
                    'password' => 'required|min:5',
                    'last_name' => 'required|string|min:3|max:25',
                    'first_name' => 'required|string|min:3|max:25',
                    'father_name' => 'required|string|min:3|max:25',
                    'number_phone' => 'required|unique:users|max:15',
                    'work_experience' => 'required|string|max:255',
                    'education' => 'required|string|max:255',
                    'date_of_birth' => 'required|date',
                    'residence_address' => 'required|string|max:255',
                    'path_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg,|max:2048'
                ]);
                if($request->hasFile('path_img')){
                    $image = $request->file('path_img');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/storage/img');
                    $image->move($destinationPath, $name);
                    $avatar = '' . $name;
                    Hash::make($request->password);
                    User::create([
                        'email' => $request->email,
                        'password' => $request->password,
                        'last_name' => $request->last_name,
                        'first_name' => $request->first_name,
                        'father_name' => $request->father_name,
                        'number_phone' => $request->number_phone,
                        'work_experience' => $request->work_experience,
                        'education' => $request->education,
                        'date_of_birth' => $request->date_of_birth,
                        'residence_address' => $request->residence_address,
                        'path_img' => $avatar,
                    ]);
                }
                session()->flash('status', 'Врач успешно создан');
                return redirect()->route('user.index');
                }else{
                    session(['error'=>'Врач не может быть моложе 18 лет.']);
                    return redirect()->route('user.create')->withInput();
                }
            }else{
            session(['error'=>'Данный пользователь уже существует.']);
            return redirect()->route('user.create')->withInput();
        }
    }

    public function create(){
        $doctor = User::where('role', 1)->get();
        $spec = Specialization::all();
        return view("web.sections.user.create", ['doctor'=>$doctor, 'spec'=>$spec]);
    }
    public function storeSpec(Request $request){
        SpecializationUser::create($request->all());
        session()->flash('status', 'Специализация успешно присвоена.');
        return redirect()->route('user.edit',[$request->id]);
    }
    public function edit(Request $request){
        $doctor = User::find($request->id);
        $spec = Specialization::all();
        $specUser = SpecializationUser::where('user_id',$request->id)->get();

        foreach ($spec as $item){
            foreach ($specUser as $it){
                 if($item->id == $it->specialization_id) {
                     $spec = $spec->diff(collect([$item]));
                 }
            }
        }

        return view("web.sections.user.edit",['doctor'=>$doctor, 'specUser'=>$specUser, 'spec'=>$spec]);
    }
    public function update(Request $request, string $id)
    {
        $dateNow = Carbon::now();
        $doctor = User::find($id);
        if($request->date_of_birth < $dateNow->subYears(18)){
            if($request->hasFile('path_img')) {
                $image = $request->file('path_img');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/img');
                $image->move($destinationPath, $name);
                $avatar = '' . $name;
                $request->validate([
                    'email' => 'required|string|unique:users,email,' . $doctor->id,
                    'password' => 'required',
                    'last_name' => 'required|string|max:45',
                    'first_name' => 'required|string|max:45',
                    'father_name' => 'required|string|max:45',
                    'number_phone' => 'required|numeric|min:0',
                ]);
                Hash::make($request->password);
                $doctor->email = $request->email;
                $doctor->password = $request->password;
                $doctor->last_name = $request->last_name;
                $doctor->first_name = $request->first_name;
                $doctor->father_name = $request->father_name;
                $doctor->number_phone = $request->number_phone;
                $doctor->work_experience = $request->work_experience;
                $doctor->education = $request->education;
                $doctor->date_of_birth = $request->date_of_birth;
                $doctor->residence_address = $request->residence_address;
                $doctor->path_img = $avatar;
                $doctor->save();
                session()->flash('status', 'Врач успешно изменен.');
                return redirect()->route('user.edit',['id'=>$id]);
            }else{
                $doctor->update($request->all());
                session()->flash('status', 'Врач успешно изменен.');
                return redirect()->route('user.edit',['id'=>$id]);
            }
        }else{
            session(['error'=>'Врач не может быть моложе 18 лет.']);
            return redirect()->route('user.edit',['id'=>$id]);
        }

    }
    public function delete(Request $request, string $id){

        SpecializationUser::where('user_id', $id)
            ->where('specialization_id', $request->specialization_id)
            ->delete();
        session()->flash('status','Специализация были убраны.');
        return redirect()->route('user.edit',['id'=>$id]);
    }
    public function destroy(Request $request){

        $doctor = User::find($request->id);

        $records = DB::table('records')
            ->join('schedules', 'records.schedule_id', '=', 'schedules.id')
            ->join('users', 'schedules.user_id', '=', 'users.id')
            ->where('user_id', $doctor->id)
            ->where('status', '0')
            ->orWhere('status', '1')
            ->orWhere('status', '3')
            ->first();
        $col = collect();
//        dd($records === null);

            if($records === null){
                $col->push($records);
            }else{
                $col = null;
            }

        if($col != NULL){
            $doctor->delete();
            session()->flash('status', 'Врач успешно удален.');
            return redirect()->route('user.index');
        }else{
            session(['error'=>'Невозможно удалить врача, когда у него есть активные записи.']);
            return redirect()->route('user.index');
        }

    }
}
