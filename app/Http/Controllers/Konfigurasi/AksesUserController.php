<?php

namespace App\Http\Controllers\Konfigurasi;

use App\DataTables\Konfigurasi\UserDataTable;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AksesUserController extends Controller
{
    public function __construct(protected MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('pages.konfigurasi.akses-user');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.konfigurasi.akses-user-form', [
            'data' => $user,
            'action' => route('konfigurasi.akses-user.update', $user->id),
            'users' => User::where('id', '!=', $user->id)->get()->pluck('id', 'name'),
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
        ]);
    }

    public function getPermissionsByUser(User $user)
    {
        return view('pages.konfigurasi.akses-user-items', [
            'data' => $user,
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        return responseSuccess(true);
    }

}
