<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile ?? Profile::create(['user_id' => $user->id]);
        return view('profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            $profile = Profile::firstOrCreate(['user_id' => $user->id]);

            Log::info('Profile update request received', $request->all());

            // Handle file uploads
            if ($request->hasFile('profile_image')) {
                if ($profile->profile_image) {
                    Storage::delete('public/' . $profile->profile_image);
                }
                $path = $request->file('profile_image')->store('profile_images', 'public');
                $profile->profile_image = $path;
                Log::info('Profile image updated', ['path' => $path]);
            }

            if ($request->hasFile('cover_image')) {
                if ($profile->cover_image) {
                    Storage::delete('public/' . $profile->cover_image);
                }
                $path = $request->file('cover_image')->store('cover_images', 'public');
                $profile->cover_image = $path;
                Log::info('Cover image updated', ['path' => $path]);
            }

            // Update text fields
            if ($request->has('description')) {
                $profile->description = $request->description;
                Log::info('Description updated', ['description' => $request->description]);
            }
            if ($request->has('about')) {
                $profile->about = $request->about;
                Log::info('About updated', ['about' => $request->about]);
            }
            if ($request->has('experience')) {
                $profile->experience = json_decode($request->experience, true);
                Log::info('Experience updated', ['experience' => $profile->experience]);
            }
            if ($request->has('education')) {
                $profile->education = json_decode($request->education, true);
                Log::info('Education updated', ['education' => $profile->education]);
            }

            $profile->save();
            Log::info('Profile saved successfully', ['profile_id' => $profile->id]);

            return response()->json(['success' => true, 'message' => 'Profile updated successfully']);
        } catch (\Exception $e) {
            Log::error('Profile update failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}