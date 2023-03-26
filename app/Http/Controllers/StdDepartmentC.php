<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Model_student;
use App\Models\StdDepartment;


class StdDepartmentC extends Controller{
    public function index()
    {
        $departments = StdDepartment::all();
        return view('Student.register' , compact('departments'));
    }
//    public function showDepart(){
//        $departments = StdDepartment::all();
//        return view('Admin.addProgram' , compact('departments'));
//    }
}

