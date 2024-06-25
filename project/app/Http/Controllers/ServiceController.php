<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index(Request $request){


        $searchQuery = $request->input('searchService');
        if($searchQuery !== NULL){
            $services = Service::where('name', 'like', "%{$searchQuery}%")
                ->orWhere('price', 'like', "%{$searchQuery}%")
                ->orWhereHas('specialization', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', "%{$searchQuery}%");
                })
                ->paginate(10);
        }
        else{
            $services = Service::paginate(10);
        }
        $spec = Specialization::all();

        return view("web.sections.service.index", ['services'=>$services, 'spec' => $spec]);
    }
    public function edit(Request $request){
        if ($request->has('specialization_id')) {
            $services = Service::where('specialization_id', $request->specialization_id)->paginate(10);
        }else{
            $services = Service::all();
        }
        $spec = Specialization::all();
        return view("web.sections.service.edit", ['services'=>$services, 'spec' => $spec]);
    }
    public function show(){

        $service = Service::all();
        $specializations = Specialization::all();

        return view("web.sections.service.show",['service'=>$service, 'specializations'=> $specializations]);


    }
    public function store(Request $request){
        $serviceCheck = Service::where('name', $request->name)
            ->where('specialization_id', $request->specialization_id)->first();

        if($serviceCheck === NULL){
            $request->validate([
                'name' => 'required|unique:services,name,',
                'price' => 'required|numeric|min:0',
            ]);
            Service::create($request->all());
            session()->flash('status', 'Услуга успешно создана.');
            return redirect()->route('service.index');

        }else{
            session(['error'=>'Данная услуга уже существует.']);
            return redirect()->route('service.index');
        }

    }

    public function update(Request $request, string $id){
        $service = Service::find($id);

            $request->validate([
                'name' => 'required|unique:services,name,' . $service->id,
                'price' => 'required|numeric|min:0',
            ]);
            $service->update($request->all());
            session()->flash('status', 'Услуга успешно обновлена.');
            return redirect()->route('service.index');
    }
    public function destroy(Request $request){
        $service = Service::find($request->id);
        $service->delete();
        session()->flash('status', 'Усулга успешна удалена.');
        return redirect()->route('service.index');
    }
}
