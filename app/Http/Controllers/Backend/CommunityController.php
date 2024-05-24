<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Models\Community;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::all();
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
        Community::create($request->validated() + ['users_id' => auth()->id()]);
        return to_route('communities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

        return to_route(route: 'communities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
