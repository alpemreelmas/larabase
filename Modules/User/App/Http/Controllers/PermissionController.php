<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view("user::permissions.index",compact("permissions"));
    }

    public function edit(Permission $permission)
    {
        return view("user::permissions.edit",compact("permission"));
    }

    public function update(EditPermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return to_route("user::permissions.index");
    }
}
