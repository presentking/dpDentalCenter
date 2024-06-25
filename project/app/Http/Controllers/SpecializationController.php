<?php

namespace App\Http\Controllers;
use App\Models\Service;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index(Request $request){
        if($request->filled('search')){
            $category = Specialization::search($request->search)->paginate(10);
        }else{
            $category = Specialization::paginate(10);

        }

        return view("web.sections.category.index",['category' => $category]);
    }
    public function create(){
        $specializations = Specialization::all();
//        dd($specializations);
        return view("index",['specializations' => $specializations]);
    }
    public function store(Request $request){
        $specCheck = Specialization::where('name', $request->name)->first();

        if($specCheck === NULL){
            $request->validate([
                'name' => 'required|string|min:4|max:45',
                'description' => 'required|string|max:700'
            ]);
            Specialization::create($request->all());
            session()->flash('status', 'Специализация успешно создана.');
            return redirect()->route('specialization.index');


        }else{
            session(['error'=>'Данная спицеализация уже существует.']);
            return redirect()->route('specialization.index');
        }
    }
    public function show(){

        $service = Service::all();
        $category = Specialization::all();

        return view("web.sections.category.show",['service'=>$service, 'category' => $category]);


    }

    public function edit(){

    }

    public function update(Request $request,string $id){
        $specialization = Specialization::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:specializations,name,' . $specialization->id,
            'description' => 'required|string|max:700'
        ]);
        $specialization->update($request->all());
        session()->flash('status', 'Специализация успешно изменена.');
        return redirect()->route('specialization.index');
    }

    public function destroy(Request $request,string $id){
        $specialization = Specialization::find($id);
        $specialization->delete();
        session()->flash('status', 'Специализация успешно удалена.');
        return redirect()->route('specialization.index');
    }
}
