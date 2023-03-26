<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Dashboard;
use App\Models\Model_admin;
use App\Models\Model_student;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\logout;
use App\Http\Controllers\Student;
use App\Http\Controllers\StdProgramsC;
use App\Http\Controllers\AddDepartment;
use App\Http\Controllers\AddProgram;
use App\Http\Controllers\StdDepartmentC;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;



Route::get('/User', function(){
    return "Hello";
});
Route::get('/', [User::class, 'index']);
Route::get('/Admin/load_login_page', [Admin::class, 'load_login_page']);

Route::post("/Admin/perform_login", [Admin::class, 'perform_login']);
//Route::get('/Dashboard/admin_dashboard',[Dashboard::class, 'adminDashboard']);
Route::get('/User/list', [User::class, 'listUser']);
Route::get('/User/add', [User::class, 'insertUser']);
Route::get('/User/update', [User::class, 'updateUser']);
Route::get('/User/delete', [User::class, 'deleteUser']);
Route::get('/set-session', [SessionController::class, 'setSession']);
Route::get('/get-session', [SessionController::class, 'getSession']);
Route::get('/Admin/logout', [Admin::class, 'perform_logout']);
Route::get('/Student/registeration', [Admin::class,  function(){
    return view("Student.register");
}]);
Route::post('/Student/register', [Student::class , 'register']);
//Route::get('/department/index',[StdDepartmentC::class, 'index']);
Route::get('/getPrograms/{dept_id}',[StdProgramsC::class, 'getPrograms']);
Route::get('/Admin/add-department', [AddDepartment::class, 'addDepart'])->middleware(['auth']);
Route::post('Admin/add-department', [AddDepartment::class, 'addDepartmentSubmit'])->name('departments.add');
Route::delete('/Admin/add-department/{dep_id}', [AddDepartment::class, 'deleteDepartment'])->name('departments.delete');
Route::get('/Admin/add-department/{dep_id}/edit', [AddDepartment::class, 'editDepartment'])->name('departments.edit')->middleware(['auth']);
Route::put('/Admin/add-department/{dep_id}', [AddDepartment::class, 'updateDepartment'])->name('departments.update');
Route::get('/Admin/add-program', [StdProgramsC::class, 'showDepart'])->middleware(['auth']);
Route::post('/Admin/add-program', [StdProgramsC::class, 'addProgram']);
Route::delete('/Admin/add-program/{pg_id}',[StdProgramsC::class,'deleteProgram']);
Route::get('/Admin/add-building',[BuildingController::class ,'passData'])->middleware(['auth']);
Route::post('/Admin/add-building',[BuildingController::class ,'addBuilding']);
Route::get('/Admin/add-room',[RoomController::class,'passData'])->middleware(['auth']);
Route::post('/Admin/add-room',[RoomController::class,'addRoom']);
