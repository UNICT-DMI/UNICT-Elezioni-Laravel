<?php

namespace App\Http\Controllers;

use App\Models\Schede;
use Illuminate\Http\Request;

class SchedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Schede::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('organo_id', 'seggio', 'schede_bianche', 'schede_nulle', 'schede_contestate');
        $info_schede = new Schede();
        $info_schede->organo_id = $data['organo_id'];
        $info_schede->seggio = $data['seggio'];
        $info_schede->schede_bianche = $data['schede_bianche'];
        $info_schede->schede_nulle = $data['schede_nulle'];
        $info_schede->schede_contestate = $data['schede_contestate'];
        $info_schede->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schede  $schede
     * @return \Illuminate\Http\Response
     */
    public function show(Schede $schede)
    {
        return $schede;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schede  $schede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schede $schede)
    {
        $data = $request->only('organo_id', 'seggio', 'schede_bianche', 'schede_nulle', 'schede_contestate');
        $schede->organo_id = $data['organo_id'];
        $schede->seggio = $data['seggio'];
        $schede->schede_bianche = $data['schede_bianche'];
        $schede->schede_nulle = $data['schede_nulle'];
        $schede->schede_contestate = $data['schede_contestate'];
        $schede->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schede  $schede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schede $schede)
    {
        $schede->delete();
        return $this->index();
    }
}
