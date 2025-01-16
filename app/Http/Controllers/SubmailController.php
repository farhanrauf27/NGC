<?php

namespace App\Http\Controllers;

use App\Models\Submail;
use Illuminate\Http\Request;

class SubmailController extends Controller
{
    public function submail()
    {
        return view('welcome');
    }
  
    public function substore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
  
        SubMail::create($request->all());
  
        return redirect()->back()
                         ->with(['success' => 'Successfully subscribe']);
    }
}
