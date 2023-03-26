<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\RoomModel;
use App\Models\BuildingModel;
use App\Models\StudentModel;




class Dashboard extends Controller{
public function adminDashboard(){
$students=StudentModel::all()->toArray();
$buildings=BuildingModel::all()->toArray();
$rooms=RoomModel::all()->toArray();
return view('Dashboard.admin_dashboard',compact('students','buildings','rooms'));
}
}
