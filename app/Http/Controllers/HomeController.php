<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       //Role::create(['name' => 'writer']);
        //$permission = Permission::create(['name' => 'Go NAVY']);

       $role = Role::findById(1);
       //$permission = Permission::findById(2);
       $permission = Permission::findById(1);

       //$role->givePermissionTo($permission);
       //$permission->removeRole($role);
       $role->revokePermissionTo($permission);

     

        $products = Product::select()->orderBy('id', 'desc')->take('4')->get();
        return view('home', compact('products'));
    }
}
