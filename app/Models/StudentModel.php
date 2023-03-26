<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
protected  $table = 'students';
protected $primaryKey='std_id';

public  $incrementing=true;

protected $fillable=[
    'std_id',
    'std_rollNo',
    'std_name',
    'department',
    'std_section',
    'program',
    'std_gender',
    'std_email',
    'std_address',
    'std_contact',
    'std_semester',
    'std_password',
    'admin_id',
    'created_at',
];
}
