<?php

namespace App\Http\Controllers\Admin;

use App\Fitpro\Notifications\Flash;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct() {
        if (Gate::denies('administer-roles')) {
            Flash::danger('You don\'t have permission to do that.');
            return redirect('/');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $usersWithRoles = User::with('roles')->orderBy('last_name')->get();

        return view('admin.roles.index', [
            'roles'       => $roles,
            'permissions' => $permissions,
            'users'       => $usersWithRoles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'role_name' => $request->get('role_name'),
            'role_slug' => $request->get('role_slug')
        ]);

        Flash::success('The role "' . $role->role_name . '" was successfully created.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function permissions(Request $request)
    {
        try {
            $permission = Permission::find($request->get('permission_id'));
            $role = Role::find($request->get('role_id'));

            $role->givePermissionTo($permission);

            Flash::success('The permission "' . $permission->permission_name . '" was successfully assigned to the role "' . $role->role_name . '"');
        } catch (\Exception $e) {
            Flash::danger('The relationship you specified already exists: ' . $e->getMessage());
        }

        return back();
    }

    public function users(Request $request)
    {
        try {
            $role = Role::find($request->get('role_id'));
            $user = User::find($request->get('user_id'));

            $roleSlug = $role->role_slug;

            $user->assignRole($roleSlug);

            Flash::success('The role "' . $role->role_name .  '" was successfully assigned to the user ' . $user->first_name . ' ' . $user->last_name);
        } catch (\Exception $e) {
            Flash::danger('The relationship you specified already exists: ' . $e->getMessage());
        }

        return back();
    }
}
