<?php

namespace App\Http\Controllers;

use App\Models\Votilista;
use Illuminate\Http\Request;

class VotilistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Votilista::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('lista_id', 'seggio', 'voti');
        $votilista = new Votilista();
        $votilista->lista_id = $data['lista_id'];
        $votilista->seggio = $data['seggio'];
        $votilista->voti = $data['voti'];
        $votilista->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Votilista  $votilista
     * @return \Illuminate\Http\Response
     */
    public function show(Votilista $votilista)
    {
        return $votilista;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Votilista  $votilista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votilista $votilista)
    {
        $data = $request->only('lista_id', 'seggio', 'voti');
        $votilista->lista_id = $data['lista_id'];
        $votilista->seggio = $data['seggio'];
        $votilista->voti = $data['voti'];
        $votilista->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Votilista  $votilista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votilista $votilista)
    {
        $votilista->delete();
        return $this->index();
    }
}
