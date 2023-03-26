<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_admin extends Model
{
    use HasFactory;
    protected $table ="admin_login";
    protected $primaryKey ="admin_id";
//    The property $incrementing in a model table is used to specify whether
// the primary key of the table uses an auto-incrementing value. If the value is set to true,
// the primary key of the table will automatically be incremented with each new record.
    public $incrementing=true;
//    The property $keyType in a model class is used to specify the data type
// for the primary key of the table associated with the model.
    protected $keytype='int';


    protected $fillable = [
            "admin_id",
            "admin_username",
            "admin_password",
            "admin_image",
            "admin_email",
            "admin_contact",
            "admin_address",
             "created_datetime"

        ];
}
