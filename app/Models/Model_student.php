<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_student extends Model

{
    public $timestamps = false;
    use HasFactory;

    protected $table = "students";
    protected $primaryKey = "std_id";
//    The property $incrementing in a model table is used to specify whether
// the primary key of the table uses an auto-incrementing value. If the value is set to true,
// the primary key of the table will automatically be incremented with each new record.
    public $incrementing = true;
//    The property $keyType in a model class is used to specify the data type
// for the primary key of the table associated with the model.
    protected $keytype = 'int';


    protected $student_properties = [
        "std_id",
        "std_rollNo",
        "std_name",
        "department",
        "program",
        "std_section",
        "std_gender",
        "std_email",
        "std_address",
        "std_contact",
        "std_semester",
        "std_password",
        "admin_id"

    ];
}
