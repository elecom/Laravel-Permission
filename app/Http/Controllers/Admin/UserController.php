<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index');
    }

    public function datatable(){
        return DataTables::of(User::all())
                ->addColumn('role', function(User $user){
                    dd($user->roles->name);
                    //return $user->roles->name;
                })    
                ->make(true);
    }
}
