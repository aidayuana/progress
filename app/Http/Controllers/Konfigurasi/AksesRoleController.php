<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\RoleDataTable;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Konfigurasi\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AksesRoleController extends Controller
{
    public function __construct(protected MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.konfigurasi.akses-role');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $roles = Role::where('id', '!=', $role->id)->get()->pluck('id', 'name');
        return view('pages.konfigurasi.akses-role-form', [
            'data' => $role,
            'action' => route('konfigurasi.akses-role.update', $role->id),
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
            'roles' => $roles
        ]);
    }


    /**
     * getPermissionsByRole
     */
    public function getPermissionsByRole(Role $role)
    {
        return view('pages.konfigurasi.akses-role-items', [
            'data' => $role,
            'menus' => $this->getMenus(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);

        return responseSuccess(true);
    }
}
