<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        
    }
    public function show(){
        $doctors = User::where('role', 1)->get();
        // return redirect()->route('doctors.show');
        return view("web.sections.admin.show",['doctors'=>$doctors]);
    }
    public function store(){
        
    }
    public function create(){
        
    }
    public function update(){
        
    }
    public function delete(){
        
    }
}
