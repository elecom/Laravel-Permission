<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function allPermissions(){
        return Permission::select(['id', 'name'])->orderBy('id')->get();
    }

    public function datatable(){
        return DataTables::of(Role::all())->make(true);    
    }
}
