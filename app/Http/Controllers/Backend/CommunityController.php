<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Models\Community;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\CommunityPostResource;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::paginate(5)->through(fn($community) => [
            'id' => $community->id,
            'name' => $community->name,
            'slug' => $community->slug,
        ]);
        return inertia::render('Communities/Index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Communities/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityStoreRequest $request)
    {
        Community::create($request->validated() + ['user_id' => auth()->id()]);
        return to_route('communities.index')->with('message', 'Community created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $community = Community::where('slug', $slug)->with('posts')->firstOrFail();
        return Inertia::render('Communities/Show', [
            'community' => $community,
            'posts' => $community->posts,
            'communities' => Community::all(),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        return Inertia::render('Communities/Edit', [
            'community' => $community
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunityStoreRequest $request, Community $community)
    {
        $community->update($request->validated());

        return to_route(route: 'communities.index')->with('message', 'Community updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return back()->with('message', 'Community deleted successfully');
    }
}

