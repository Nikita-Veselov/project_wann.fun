<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPassword;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
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
        
        return redirect()->to('/');
    }

    public function reset (ResetPassword $request) {
        
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['success' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}
