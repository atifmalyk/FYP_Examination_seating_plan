<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table='room';
    protected $primaryKey='room_id';

    public $incrementing =true;

    protected $fillable=[
        'room_id',
        'room_no',
        'room_length',
        'room_width',
        'building_id',
        'created_by_id',
        'created_date_time',
        'last_update_date_time',
        'last_update_by_id',
        'admin_id'

    ];
}
