<?php

namespace App\Http\Controllers;

use App\Models\Voto;
use Illuminate\Http\Request;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Voto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('lista_id');
        $voto = new Voto();
        $voto->lista_id = $data['lista_id'];
        $voto->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voto  $voto
     * @return \Illuminate\Http\Response
     */
    public function show(Voto $voto)
    {
        return $voto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voto  $voto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voto $voto)
    {
        $data = $request->only('lista_id');
        $voto->lista_id = $data['lista_id'];
        $voto->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voto  $voto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voto $voto)
    {
        $voto->delete();
        return $this->index();
    }
}
