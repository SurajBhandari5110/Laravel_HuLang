<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:10000',
        ]);

        $post = Auth::user()->posts()->create([
            'content' => $validatedData['content'],
        ]);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post->load('user')
        ], 201);
    }
}