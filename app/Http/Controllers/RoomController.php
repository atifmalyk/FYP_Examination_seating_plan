<?php

namespace App\Http\Controllers;

use App\Models\BuildingModel;
use App\Models\Model_admin;
use App\Models\RoomModel;
use App\Models\StdDepartment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class RoomController extends Controller
{

    public function addRoom(Request $request){
        $room= new RoomModel();
        $admin=new Model_admin();
        $room->room_no=$request->room_no;
        $room->building_id=$request->building_id    ;
        $room->room_length=$request->room_length;
        $room->room_width=$request->room_width;
//        $room->created_by_id=session('admin');
        $room->created_at=now();
        $room->save();
        return redirect()->back();

    }

    //The code $rooms = RoomModel::join('building_models',
    // 'room_models.building_id', '=', 'building_models.id')->select('room_models.*',
    // 'building_models.building_name')->get(); is performing a SQL join operation between two database tables,
    // room_models and building_models. The join method is used to specify the join condition between the two tables.
    //
    //The first parameter of the join method is the name of the table to join with (building_models in this case),
    // and the second parameter is the join condition. Here, we're joining the room_models table with the
    // building_models table on the building_id foreign key column in the room_models table and the primary
    // key column id in the building_models table.
    //
    //The select method is used to specify the columns to be selected from the resulting joined table.
    // Here, we're selecting all columns from the room_models table (room_models.*), and also selecting
    // the building_name column from the building_models table, which is aliased as building_name.
    //
    //The resulting joined and selected data is then retrieved from the database using the get method,
    // and is stored in the $rooms variable.
    //
    //By performing this join operation, we can retrieve data from both the room_models and building_models
    // tables in a single query, and access the building_name property of the BuildingModel in the view, as we
    // showed in the previous example
//We are selecting all columns from the room_models
// table because we want to retrieve all the room data for display in the view.
// If we didn't select all columns, we would only have access to the room_no, room_length, room_width,
// created_by_id, created_at, updated_at, and last_updated_by_id columns in the view, and we would not be able
// to display any other information about the rooms.
    public function passData()
    {
        $rooms = RoomModel::join('building', 'room.building_id', '=', 'building.building_id')
            ->select('room.*', 'building.building_name')
            ->get();
        $buildings = BuildingModel::all();
        return view('Admin.addRoom', compact('rooms', 'buildings'));
    }
}


