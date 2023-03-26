<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StdProgram;
use App\Models\StdDepartment;


class StdProgramsC extends Controller
{
//    This is a Laravel PHP function that is part of a controller class. When this function is called,
// it will retrieve programs from the "std_program" table where the "dep_id" column matches the value of
// the $departmentId argument passed to the function.
//The function uses the "where" method of the "StdProgram" model to filter the programs based on the "dep_id".
// The result of the query is stored in the $programs variable.
//Finally, the function returns the result as a JSON response using the "response()->json($programs)" method.
// This will format the result as a JSON object that can be easily processed by JavaScript.
    public function getPrograms($departmentId)
    {
        $programs = StdProgram::where('dept_id', $departmentId)->get();

        return response()->json($programs);
    }

    public function addProgram(Request $request)
    {
        // Validate the form input here

        $program = new StdProgram();
        $program->pg_name = $request->pg_name;
        $program->dept_id = $request->department;
        $program->save();

//        $programs = StdProgram::all();

        return redirect()->back();
    }

    public function showDepart()
    {
        $programs = StdProgram::all();
        $departments = StdDepartment::all();
        return view('Admin.addProgram', compact('departments', 'programs'));
    }

    public function deleteProgram($pg_id)
    {
        DB::table('std_program')->where('pg_id', $pg_id)->Delete();

    }
}
