<?php

namespace App\Http\Controllers;

use App\Models\Voticandidato;
use Illuminate\Http\Request;

class VoticandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Voticandidato::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('candidato_id', 'seggio', 'voti');
        $voticandidato = new Voticandidato();
        $voticandidato->candidato_id = $data['candidato_id'];
        $voticandidato->seggio = $data['seggio'];
        $voticandidato->voti = $data['voti'];
        $voticandidato->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voticandidato  $voticandidato
     * @return \Illuminate\Http\Response
     */
    public function show(Voticandidato $voticandidato)
    {
        return $voticandidato;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voticandidato  $voticandidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voticandidato $voticandidato)
    {
        $data = $request->only('candidato_id', 'seggio', 'voti');
        $voticandidato->candidato_id = $data['candidato_id'];
        $voticandidato->seggio = $data['seggio'];
        $voticandidato->voti = $data['voti'];
        $voticandidato->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voticandidato  $voticandidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voticandidato $voticandidato)
    {
        $voticandidato->delete();
        return $this->index();
    }
}
