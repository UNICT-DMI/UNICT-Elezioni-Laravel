<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lista::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('organo_id', 'nome', 'seggi_pieni', 'resti', 'seggi_ai_resti', 'seggi_totali');
        $lista = new Lista();
        $lista->organo_id = $data['organo_id'];
        $lista->nome = $data['nome'];
        $lista->seggi_pieni = $data['seggi_pieni'];
        $lista->resti = $data['resti'];
        $lista->seggi_ai_resti = $data['seggi_ai_resti'];
        $lista->seggi_totali = $data['seggi_totali'];
        $lista->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
        return $lista;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        $data = $request->only('organo_id', 'nome', 'seggi_pieni', 'resti', 'seggi_ai_resti', 'seggi_totali');
        $lista->organo_id = $data['organo_id'];
        $lista->nome = $data['nome'];
        $lista->seggi_pieni = $data['seggi_pieni'];
        $lista->resti = $data['resti'];
        $lista->seggi_ai_resti = $data['seggi_ai_resti'];
        $lista->seggi_totali = $data['seggi_totali'];
        $lista->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        $lista->delete();
        return $this->index();
    }
}
