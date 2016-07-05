<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        $admins = Admin::all();

        return view('admin.login', [
            'pages' => [],
            'admins' => $admins
        ]);
    }

    public function login(AdminLoginRequest $request)
    {
        $adminId = $request->admin_id;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['id' => $adminId, 'password' => $password])) {
            $admin = Admin::findOrFail($adminId);
            $admin->login_at = Carbon::now();

            $admin->save();

            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->withErrors(['password' => 'Falsches Passwort']);
    }

}