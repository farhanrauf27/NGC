<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function superAdminHome()
    {
        return view('products.index');
    }
    public function managerHome()
    {
        return view('managerHome');
    }
    public function userTable()
{
    $users = User::where('type', 0)->get();
    return view('usertable', compact('users'));
}


    
}