<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        // Fetch all user profiles
        $userProfiles = UserProfile::all();

        return view('user_profiles.index', compact('userProfiles'));
    }

    public function create()
    {
        // Show the form to create a new user profile
        return view('user_profiles.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:user_profiles',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        // Create a new user profile
        $userProfile = UserProfile::create($validatedData);

        // Redirect to the user profile show page
        return redirect()->route('user_profiles.show', $userProfile->id)->with('success', 'User profile created successfully');
    }

    public function show($id)
    {
        // Find and display the user profile
        $userProfile = UserProfile::findOrFail($id);

        return view('user_profiles.show', compact('userProfile'));
    }

    public function edit($id)
    {
        // Find and display the user profile edit form
        $userProfile = UserProfile::findOrFail($id);

        return view('user_profiles.edit', compact('userProfile'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:user_profiles,email,' . $id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        // Find the user profile and update its attributes
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->update($validatedData);

        // Redirect to the user profile show page
        return redirect()->route('user_profiles.show', $userProfile->id)->with('success', 'User profile updated successfully');
    }

    public function destroy($id)
    {
        // Find and delete the user profile
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->delete();

        // Redirect to the user profile index page
        return redirect()->route('user_profiles.index')->with('success', 'User profile deleted successfully');
    }
}
