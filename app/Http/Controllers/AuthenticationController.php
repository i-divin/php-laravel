<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{   
    public function showWelcome() {
        return view('welcome');
    }

    
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function allusers() {
        $all_users = Authentication::all();
        return view('home', compact('all_users'));
    }

    public function registerHandler(Request $request) {
        $data = $request->validate([
            'username'=> 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);
//insert method register
        $user = Authentication::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' =>($data['password']) // **Secure password storage**
        ]);

        return $user ? redirect()->route('login')->with('success','Registered successfully!')
                     : back()->withErrors(['register' => 'Failed to register!']);
    }
//login 
    public function loginHandler(Request $request) {
        $credentials = $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        $user = Authentication::where('username', $credentials['username'])->first();
        
        if ($user && $credentials['password']=== $user->password) {
            return redirect()->route('home')->with('success', 'Logged in successfully!');
        } else {
            return back()->withErrors('Username or password is incorrect');
        }
    }
//log out
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
//delete user
    public function destroy($id) {
        $user = Authentication::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
//update user
public function viewUpdate($id) {
    $user = Authentication::findOrFail($id);
    return view('update', compact('user'));
}


public function update(Request $request, $id) {
    $request->validate([
        'username' => 'required',
        'email' => 'required',
        'password' => 'nullable'
    ]);

    $user = Authentication::findOrFail($id);

    $data = [
        'username' => $request->username,
        'email' => $request->email
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect('home')->with('success', 'User updated successfully!');
}

}
