<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Model_admin;
use App\Models\RoomModel;
use App\Models\BuildingModel;
use App\Models\StudentModel;



class Admin extends Controller
{
    public function load_login_page()
    {
        return view('Admin.login');
    }
public function addDepartment(){
        return view('Admin.addDepartment');
}
    public function perform_login(Request $request)
    {
        //The Request object is used in this function to access the data from the incoming HTTP request,
        // such as the form data or query parameters.
        // This allows you to retrieve user input from the request and use it in your application logic.
        $credentials = $request->input();
        $admin_username = $credentials['admin_username'];
        $admin_password = $credentials['admin_password'];
        //This code is using Eloquent ORM (Object Relational Mapping) to retrieve a record from the Model_admin table where the
        // admin_username and admin_password columns match the given values.
        $admin = Model_admin::where('admin_username', '=', $admin_username)->where('admin_password', '=', $admin_password)->get();
        if (count($admin) > 0)
        {
            $students=StudentModel::all()->toArray();
            $buildings=BuildingModel::all()->toArray();
            $rooms=RoomModel::all()->toArray();
            $request->session()->put('admin', $admin[0]);
            return view('Dashboard.admin_dashboard',compact('students','buildings','rooms'));
        }
        else
            return "not found";
        //call model
        //check username and password exists in model
        //if credentials exists then ok
        //else show error "Username or Password are incorrect"
    }
    public function perform_logout(Request $request)
    {
        $request->session()->forget('admin');
        return view('Admin.login');
    }

    public function index()
    {
        session_start();
        $admin = SESSION["admin"];
        if ($admin)
            return view("Dashboard.admin_dashboard");
        else
            return \view("Login");
    }


}
