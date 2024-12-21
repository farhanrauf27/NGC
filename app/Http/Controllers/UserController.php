<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;


class UserController extends Controller
{
    
    public function userTable()
{
    // Fetch users with type 0
    $users = User::where('type', 0)->get();

    // Return the Blade view with the data
    return view('usertable', compact('users'));
}


    
}