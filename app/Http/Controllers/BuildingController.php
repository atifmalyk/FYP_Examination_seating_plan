<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BuildingModel;
use Illuminate\Support\Facades\DB;


class BuildingController extends Controller
{
public  function passData(){
    $buildings=BuildingModel::all();
    return view('Admin.addBuilding', compact('buildings'));
}
public  function addBuilding(Request $request){
    $buildingName=$request->input('building_name');
    $buildingAdress=$request->input('building_address');
    $buildingContact=$request->input('building_contact');
    $createdDateTime=now();
    $createdBy=session('admin_id');
    $lastUpdatedBy=session('admin_id');
    $lastUpdatedAt=now();



    DB::table('building')->insert([
        'building_name'=>$buildingName,
        'building_address'=>$buildingAdress,
        'building_contact'=>$buildingContact,
        'created_at'=>$createdDateTime,
        'created_by_id'=>$createdBy,
        'last_updated_by_id'=>$lastUpdatedBy,
        'updated_at'=>$lastUpdatedAt
    ]);
    return redirect('/Admin/add-building');
}
}

