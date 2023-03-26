<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Model_AddDepartment extends Model
{
    use HasFactory;

    protected $table = "std_departments";
    protected $primaryKey ="dep_id";
    public $incrementing=true;

    protected $fillable=[
        'dep_id',
        'dep_name',
        'create_date_time',
        'last_updated_by',
        'last_update_date_time'


    ];
}
