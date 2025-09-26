<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class settingController extends Controller
{
    public function addRoles(Request $request){
        $request->validate([
            'name' => 'required|string',
            'access' => 'nullable',
            'icon' => 'nullable|string',
        ]);
        $name = $request->input('name');
        if($request->hasFile('file')){
         $file = $request->file('file');
         $filename = time() . '_' . $file->getClientOriginalName();

        // Move file to /public/userAssets
         $file->move(public_path('userAssets'), $filename);

        // Save relative path in DB
         $icon = 'userAssets/' . $filename;        
        }
        else{
            $icon = null;
        }
         $jaccess = $request->except('name', 'icon', '_token');
         $access = json_encode($jaccess);

        Roles::create([
            'name' => $name,
            'icon' => $icon,
            'access' => $access
        ]);
        return redirect()->back()->with('status','role-added');
    }
    
}
