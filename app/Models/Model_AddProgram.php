<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Model_AddProgram extends Model
{

    protected $table = "std_departments";

    protected $primaryKey ="dep_id";
    public $incrementing=true;

}
