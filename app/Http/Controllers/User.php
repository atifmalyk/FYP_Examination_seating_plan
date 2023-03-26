<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class User extends Controller
{

    public function index(){
        //return "index";
        return view("Users.index");
    }
    /**
     * This function will show the list of all users
     * @return string
     */
    public function listUser()
    {
        return "this page will show the list of all users";
    }

    public function insertUser()
    {
        return "Inserting data";
    }

    public function updateUser()
    {
        return "Updating data";
    }

    public function deleteUser()
    {
        return "deleting users";
    }
}
