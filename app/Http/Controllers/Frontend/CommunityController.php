<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Community;

class CommunityController extends Controller
{
    public function show($slug)
    {
        $community = Community::where('slug', $slug)->first();

        return Inertia::render('Frontend/Communities/Show', compact('community'));
    }
}
