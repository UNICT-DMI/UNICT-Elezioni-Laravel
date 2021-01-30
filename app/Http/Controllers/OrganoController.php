<?php

namespace App\Http\Controllers;

use App\Models\Organo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Organo::all()->reduce(function ($res, $organo) {
            $tmp = $organo->toArray();
            if ($organo->schedes != null) {
                $bianche = DB::table('schedes')
                    ->where('organo_id', '=', $organo->id)
                    ->sum('schede_bianche');
                $nulle = DB::table('schedes')
                    ->where('organo_id', '=', $organo->id)
                    ->sum('schede_nulle');
                $contestate = DB::table('schedes')
                    ->where('organo_id', '=', $organo->id)
                    ->sum('schede_contestate');

                $tmp += ['schede' => [
                    'bianche' => $bianche,
                    'nulle' => $nulle,
                    'contestate' => $contestate
                ]];
            }
            array_push($res, $tmp);
            return $res;
        }, array());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('biennio', 'nome', 'numero_seggi');
        $nuovo_organo = new Organo();
        $nuovo_organo->biennio = $data['biennio'];
        $nuovo_organo->nome = $data['nome'];
        $nuovo_organo->numero_seggi = $data['numero_seggi'];
        $nuovo_organo->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organo = Organo::find($id);
        return $organo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('biennio', 'nome', 'numero_seggi');
        $organo = Organo::find($id);
        $organo->biennio = $data['biennio'];
        $organo->nome = $data['nome'];
        $organo->numero_seggi = $data['numero_seggi'];
        $organo->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Organo::find($id)->delete();
        return $this->index();
    }
}
