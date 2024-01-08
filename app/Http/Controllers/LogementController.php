<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $logement = Logement::where('Num_cite', $id)->get();

        // $cite = Logement::with('citee')->where('Num_cite', $id)->get();
        // $nomLogement = null;
        // if ($cite->first() == null) {
        //     $nomLogement = "null";
        // } else {
        //     $nomLogement = $cite->first()->citee->Nom_cite;
        // }


        return view('LOGEMENT/listLogement', compact(['logement', 'id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('LOGEMENT/newLogement', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([

            'Num_cite' => 'required',
            'Libelle_logement' => 'required',
            'Nombre_piece' => 'required',
            'Superficie' => 'required',
            'Type_vente' => 'required',
            'Prix_logement' => 'required',

        ]);

        $logement = new Logement();
        $logement->Num_cite = $id;
        $logement->Libelle_logement = $request->Libelle_logement;
        $logement->Nombre_piece = $request->Nombre_piece;
        $logement->Superficie = $request->Superficie;
        $logement->Type_vente = $request->Type_vente;
        $logement->Prix_logement = $request->Prix_logement;
        $logement->save();

        return redirect()->route('logement.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function show(Logement $logement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function edit(Logement $logement, $id)
    {
        $existLogement = Logement::where('Num_logement', $id)->first();

        return view('LOGEMENT/modifLogement', compact(['existLogement']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logement $logement, $id)
    {
        $validate =  $request->validate([

            'Num_cite' => 'required',
            'Libelle_logement' => 'required',
            'Nombre_piece' => 'required',
            'Superficie' => 'required',
            'Type_vente' => 'required',
            'Prix_logement' => 'required',
        ]);

        Logement::where('Num_logement', $id)->update($validate);

        $result = DB::table('Logements')->where('Num_logement', $id)->first();
        $numCite = $result->Num_cite;
        return redirect()->route('logement.index', $numCite);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logement $logement, $id)
    {
        $result = DB::table('logements')->where('Num_logement', $id)->first();
        $numCite = $result->Num_cite;
        Logement::where('Num_logement', $id)->delete();
        return redirect()->route('logement.index', $numCite);
    }
}
