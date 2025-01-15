<?php

namespace App\Http\Controllers;

use App\Models\none;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\CreatePermissionRequest;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Commands\CreatePermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Permissions/PermissionIndex', [
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Permissions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request): RedirectResponse
    {
        Permission::create($request->validated());
        return to_route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(none $none)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(none $none)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, none $none)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(none $none)
    {
        //
    }
}
