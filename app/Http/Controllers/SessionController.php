<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class SessionController extends Controller
{

    public function setSession(Request $request)
    {
        $request->session()->put('username', 'atif');
    }

    public function getSession(Request $request)
    {
        $value = $request->session()->get('username');
        return $value;
    }
}
