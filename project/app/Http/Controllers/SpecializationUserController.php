<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\SpecializationUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SpecializationUserController extends Controller
{
    public function index(Request $request){
//        return view("web.sections.user.index");
    }
    public function store(Request $request, string $id)
    {

    }
    public function destroy(Request $request){

    }
}
