<?php

namespace App\Http\Controllers;

use App\Models\SuperHero;
use App\Http\Requests\StoreSuperHeroRequest;
use App\Http\Requests\UpdateSuperHeroRequest;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuperHeroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuperHeroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function show(SuperHero $superHero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperHero $superHero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuperHeroRequest  $request
     * @param  \App\Models\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuperHeroRequest $request, SuperHero $superHero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperHero $superHero)
    {
        //
    }
}
