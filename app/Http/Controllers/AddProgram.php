<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Model_AddProgram;

class AddProgram extends Controller
{
 public function addProgram() {
     $departments = StdDepartment::all();
     return view('Admin.addProgram');
 }
}

