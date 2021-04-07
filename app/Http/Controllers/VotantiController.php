<?php

namespace App\Http\Controllers;

use App\Models\Votanti;
use Illuminate\Http\Request;

class VotantiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Votanti::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('organo_id', 'seggio', 'votanti');
        $votanti = new Votanti();
        $votanti->organo_id = $data['organo_id'];
        $votanti->seggio = $data['seggio'];
        $votanti->votanti = $data['votanti'];
        $votanti->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Votanti  $votanti
     * @return \Illuminate\Http\Response
     */
    public function show(Votanti $votanti)
    {
        return $votanti;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Votanti  $votanti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votanti $votanti)
    {
        $data = $request->only('organo_id', 'seggio', 'votanti');
        $votanti->organo_id = $data['organo_id'];
        $votanti->seggio = $data['seggio'];
        $votanti->votanti = $data['votanti'];
        $votanti->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Votanti  $votanti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votanti $votanti)
    {
        $votanti->delete();
        return $this->index();
    }
}
