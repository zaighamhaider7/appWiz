<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\userDevices;
use App\Models\Roles;
use App\Models\project;
use App\Models\ActivityLog;
use App\Models\NotificationPreference;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        //     'devices' => $request->user()->userDevices()->latest()->get(),
        // ]);
        $user = $request->user();
        $userDevices = userDevices::where('user_id',$user->id)->get();
        $roles = Roles::all();
        $allProjects = project::all();
        $projects = collect();
        $activity_logs = ActivityLog::where('user_id', auth()->id())->latest()->get();
        $preferences = NotificationPreference::where('user_id', auth()->id())
        ->pluck('is_enabled', 'notification_type');

        return view('profile.edit',compact('user','userDevices','roles','projects', 'allProjects', 'activity_logs', 'preferences'));
    }

    /**
     * Update the user's profile information.
     */
public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Fill only name and email first
    $user->fill($request->only(['name', 'email']));

    // Assign other fields explicitly
    $user->company = $request->input('company') ?: null;
    $user->website = $request->input('website') ?: null;

    // Reset email verification if changed
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Handle photo upload properly
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move file to /public/userAssets
        $file->move(public_path('userAssets'), $filename);

        // Save relative path in DB
        $user->image = 'userAssets/' . $filename;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function delDevice(Request $request){
        $deviceId = $request->id;
        userDevices::destroy($deviceId);
        return Redirect::route('profile.edit')->with('status', 'device-deleted');
    }
    
}

