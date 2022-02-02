<?php

namespace App\Http\Controllers;

use App\Dto\UserDto;
use App\Filters\Holders\UserFilterHolder;
use App\Helpers\Roles;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\Crud\UserCrudService;
use Illuminate\Http\Request;

class ManagerController extends Controller
{

    public function __construct(private UserCrudService $userCrudService)
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = $this->userCrudService->list(['manager' => Roles::ROLE_MANAGER]);
        return view('manager.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model = new UserDto($request->old());
        return view('manager.create', ['model' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->userCrudService->createWithRole($request->getData(), $request->role);

        return redirect()->route('managers.index')->with('success', 'Success created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $manager)
    {
        $model = new UserDto($request->old() ?: $manager->toArray());
        return view('manager.edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $manager)
    {
        $this->userCrudService->update($request->getData(), $manager->id);

        return redirect()->route('managers.index')->with('success', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manager)
    {
        $this->userCrudService->delete($manager->id);
        return redirect()->route('managers.index')->with('success', 'Success deleted');
    }
}
