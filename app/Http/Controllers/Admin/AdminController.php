<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\SaveAdminRequest;

class AdminController extends BaseController
{

    public function show($id = null)
    {
        $admin = new Admin();
        $new = true;

        if ($id !== null) {
            $admin = Admin::findOrFail($id);
            $new = false;
        }

        return $this->adminView('admin', [
            'admin' => $admin,
            'new' => $new
        ]);
    }

    public function save(SaveAdminRequest $request)
    {
        $admin = Admin::firstOrNew(['id' => $request->get('id')]);

        $admin->name = $request->get('name');
        $password = $request->get('password');

        if ($password !== null && $password !== '') {
            $admin->password = bcrypt($password);
        }
        
        $admin->save();

        return redirect('/admin/users');
    }

    public function delete($id)
    {
        Admin::destroy($id);

        return response()->json(true);
    }

}