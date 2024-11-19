<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $user = $request->user();

        $request->validate([
            'password' => ['nullable', 'confirmed', 'min:8'],
            'date_joining' => ['nullable', 'date'],
            'school_year' => ['nullable', 'in:First Year,Second Year,Third Year,Forth Year,Last Year'],
            'fields' => ['nullable', 'in:field1,field2,field3'],
            'linkdin_link' => ['nullable', 'url'],
            'github_link' => ['nullable', 'url'],
        ]);

        $user->fill($request->validated());

        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }

       
        if ($request->has('bio')) {
            $user->bio = $request->bio;
        }

        if ($request->has('date_joining')) {
            $user->date_joining = $request->date_joining;
        }

        if ($request->has('school_year')) {
            $user->school_year = $request->school_year;
        }

        if ($request->has('fields')) {
            $user->fields = $request->fields;
        }

        if ($request->has('linkdin_link')) {
            $user->linkdin_link = $request->linkdin_link;
        }

        if ($request->has('github_link')) {
            $user->github_link = $request->github_link;
        }


        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        
        $user->save();

        return Redirect::route('sub-fields.index', ['fields' => $request->fields])->with('status', 'Profile updated successfully!');

        // return Redirect::route('sub-fields')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate that the password is correct before deletion
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log the user out
        Auth::logout();

        // Delete the user's account
        $user->delete();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to home
        return Redirect::to('/');
    }
}
