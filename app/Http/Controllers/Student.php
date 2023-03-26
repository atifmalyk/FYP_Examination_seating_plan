<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Model_student;
use App\Models\StdDepartment;


class Student extends Controller{
//The $request variable is an instance of the Illuminate\Http\Request class in Laravel
// and it contains all the data that is sent with a HTTP request. In this case,
// the data is sent as part of a form submission, so the $request object will contain the
// values entered in the form fields.

//The $request->has($field) method checks if a particular field exists in the request data,
// and if it does, the value of that field is assigned to the corresponding property of the $student model object using
// the syntax $student->{$field} = $request->{$field};.
    public function register(Request $request)
    {

        $student = new  Model_student();

        $fields = [  "std_id",
            "std_rollNo",
            "std_name",
            "dep_name",
            "program",
            "department",
            "std_section",
            "std_gender",
            "std_email",
            "std_address",
            "std_contact",
            "std_semester",
            "std_password",
            "admin_id",
            "created_at"];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $student->{$field} = $request->{$field};
            }
        }

        $student->save();



        return view('Admin.login')->with('success', 'Student has been added successfully');
    }
}

