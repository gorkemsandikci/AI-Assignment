<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function subscriptions()
    {
        $subscriptions = Subscription::all();

        return view('admin.subscriptions', compact('subscriptions'));
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'deviceUuid' => 'required',
            'password' => 'required|string',
        ]);

        $user = User::where('device_uuid', $request->deviceUuid)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['deviceUuid' => 'The provided credentials do not match our records.']);
        }

        Auth::login($user);

        return redirect()->route('subscription');
    }

    public function register(Request $request)
    {
        $request->validate([
            'deviceName' => 'required|string|unique:users,device_name',
            'deviceUuid' => 'required|string|unique:users,device_uuid',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'device_name' => $request->get('deviceName'),
            'device_uuid' => $request->get('deviceUuid'),
            'is_admin' => 1,
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showLoginForm');
    }
}
