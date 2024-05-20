<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\KomunitasStoreRequest;
use App\Models\komunitas;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KomunitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'done';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Komunitas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KomunitasStoreRequest $request)
    {
        komunitas::create($request->validated() + ['users_id' => auth()->id()]);
        return to_route('komunitas.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
