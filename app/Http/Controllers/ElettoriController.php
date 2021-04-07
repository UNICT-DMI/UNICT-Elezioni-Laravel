<?php

namespace App\Http\Controllers;

use App\Models\Elettori;
use Illuminate\Http\Request;

class ElettoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Elettori::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('organo_id', 'seggio', 'elettori');
        $elettori = new Elettori();
        $elettori->organo_id = $data['organo_id'];
        $elettori->seggio = $data['seggio'];
        $elettori->elettori = $data['elettori'];
        $elettori->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Elettori  $elettori
     * @return \Illuminate\Http\Response
     */
    public function show(Elettori $elettori)
    {
        return $elettori;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Elettori  $elettori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elettori $elettori)
    {
        $data = $request->only('organo_id', 'seggio', 'elettori');
        $elettori->organo_id = $data['organo_id'];
        $elettori->seggio = $data['seggio'];
        $elettori->elettori = $data['elettori'];
        $elettori->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Elettori  $elettori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elettori $elettori)
    {
        $elettori->delete();
        return $this->index();
    }
}
