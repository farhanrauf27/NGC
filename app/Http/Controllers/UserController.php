<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;


class UserController extends Controller
{
    
    public function userTable()
{
    $users = User::where('type', 0)->get();
    return view('usertable', compact('users'));
}


    
}