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
                $bianche = ['totali' => DB::table('schedes')
                    ->where('organo_id', '=', $organo->id)
                    ->sum('schede_bianche')];
                $nulle = ['totali' => DB::table('schedes')
                    ->where('organo_id', '=', $organo->id)
                    ->sum('schede_nulle')];
                $contestate = ['totali' => DB::table('schedes')
                    ->where('organo_id', '=', $organo->id)
                    ->sum('schede_contestate')];

                $sorted = $organo->schedes->sortBy('seggio');
                foreach ($sorted as $schede) {
                    $key = 'seggio_n_' . $schede->seggio;
                    $bianche[$key] = $schede->schede_bianche;
                    $nulle[$key] = $schede->schede_nulle;
                    $contestate[$key] = $schede->schede_contestate;
                }

                $tmp += [
                    'schede' => [
                        'bianche' => $bianche,
                        'nulle' => $nulle,
                        'contestate' => $contestate
                    ]
                ];
            }

            if ($organo->listas != null) {
                $tmp += [
                    'liste' => [],
                    'eletti' => [],
                    'non_eletti' => []
                ];

                foreach ($organo->listas as $lista) {
                    $votiSeggi = [
                        'totali' => DB::table('votilistas')
                            ->where('lista_id', '=', $lista->id)
                            ->sum('voti')
                    ];

                    foreach ($lista->votilistas as $voti) {
                        $votiSeggi += ['seggio_n_' . $voti->seggio => $voti->voti];
                    }

                    array_push($tmp['liste'], [
                        'nome' => $lista->nome,
                        'seggi' => [
                            'seggi_pieni' => $lista->seggi_pieni,
                            'resti' => $lista->resti,
                            'seggi_ai_resti' => $lista->seggi_ai_resti,
                            'seggi_totali' => $lista->seggi_totali,
                        ],
                        'voti' => $votiSeggi
                    ]);

                    $candidatiEletti = DB::table('candidatos')->where('lista_id', '=', $lista->id)->where('eletto', true)->get();
                    $candidatiNonEletti = DB::table('candidatos')->where('lista_id', '=', $lista->id)->where('eletto', false)->get();

                    foreach ($candidatiEletti as $candidato) {
                        $votiCandidato = ['totali' => DB::table('voticandidatos')->where('candidato_id', $candidato->id)->sum('voti')];

                        $votiTable = DB::table('voticandidatos')->where('candidato_id', $candidato->id)->get();
                        foreach ($votiTable as $voti) {
                            $key = 'seggio_n_' . $voti->seggio;
                            $votiCandidato += [$key => $voti->voti];
                        }

                        array_push($tmp['eletti'], [
                            'nominativo' => $candidato->nome,
                            'lista' => $lista->nome,
                            'voti' => $votiCandidato
                        ]);
                    }

                    foreach ($candidatiNonEletti as $candidato) {
                        $votiCandidato = ['totali' => DB::table('voticandidatos')->where('candidato_id', $candidato->id)->sum('voti')];

                        $votiTable = DB::table('voticandidatos')->where('candidato_id', $candidato->id)->get();
                        foreach ($votiTable as $voti) {
                            $key = 'seggio_n_' . $voti->seggio;
                            $votiCandidato += [$key => $voti->voti];
                        }

                        array_push($tmp['non_eletti'], [
                            'nominativo' => $candidato->nome,
                            'lista' => $lista->nome,
                            'voti' => $votiCandidato
                        ]);
                    }
                }
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
     * @param  \App\Models\Organo  $organo
     * @return \Illuminate\Http\Response
     */
    public function show(Organo $organo)
    {
        return $organo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organo  $organo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organo $organo)
    {
        $data = $request->only('biennio', 'nome', 'numero_seggi');
        $organo->biennio = $data['biennio'];
        $organo->nome = $data['nome'];
        $organo->numero_seggi = $data['numero_seggi'];
        $organo->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organo  $organo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organo $organo)
    {
        $organo->delete();
        return $this->index();
    }
}
