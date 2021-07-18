<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {
        $userEmail = Auth::user()->email;
        $links = Link::select('input_url', 'output_url', 'created_at', 'id')->where('user_id', $userEmail)->get();
        
        return view('profile', [
            'links' => $links
        ]);  
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->to('/profile');
        } else {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
    }
    
    public function destroy()
    {
        Auth::logout();
        
        return redirect()->to('/main');
    }
}
