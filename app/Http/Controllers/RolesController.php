<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    public function addRoles(Request $request){
        $request->validate([
            'name' => 'required|string',
            'access' => 'nullable',
            'icon' => 'nullable|string',
        ]);
        $name = $request->input('name');
                $icon = $request->input('icon');
        $jaccess = $request->except('name', 'icon', '_token');
        $access = json_encode($jaccess);
        Roles::create([
            'name' => $name,
            'icon' => $icon,
            'access' => $access
        ]);
        return redirect()->back()->with('success','Role-Added');
    }
}
