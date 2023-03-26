<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class BuildingModel extends Model
{
protected $table='building';
protected $primaryKey="building_id";
public $incrementing=true;

protected $fillable=[
    'building_id',
    'building_name',
    'building_address',
    'building_contact'
];
    public function buildingList()
    {
        //The code you provided is a method that is returning an associative array of dep_name values and dep_id keys.
        //The pluck method is a Laravel query builder method that retrieves a single column value from the first
        // result of a query. In this case,
        // the method is used to retrieve an array of dep_name values and dep_id keys from the std_departments table.
        //pluck('dep_name', 'dep_id') - This method retrieves an array of dep_name values and dep_id keys from the
        // std_departments table. The first argument, 'dep_name', specifies the column to retrieve, and the second argument
        //, 'dep_id', specifies the key for each value in the returned array.
        return self::pluck('building_name', 'building_id');
    }
}

