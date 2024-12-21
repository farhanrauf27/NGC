<?php

namespace App\Http\Controllers;

use App\Models\Submail;
use Illuminate\Http\Request;

class SubmailController extends Controller
{
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submail()
    {
        return view('welcome');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
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
