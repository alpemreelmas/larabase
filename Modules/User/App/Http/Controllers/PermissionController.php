<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\App\Http\Requests\Permission\EditPermissionRequest;
use Spatie\Permission\Models\Permission;

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
