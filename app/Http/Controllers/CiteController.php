<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use Illuminate\Support\Facades\DB;

class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cite = Cite::with('agencess')->where('Num_agence', $id)->get();
        $nomAgence = null;
        if ($cite->first() == null) {
            $nomAgence = "null";
        } else {
            $nomAgence = $cite->first()->agencess->Libelle_agence;
        }

        return view("CITE/listCite", compact(['cite', 'id', 'nomAgence']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $ident = $id;
        return view("CITE/newCite", compact('ident'));
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
            'Nom_cite' => 'required',
            'Lieux' => 'required',
            'Quartier' => 'required',
        ]);

        $cite = new Cite();
        $cite->Nom_cite = $request->Nom_cite;
        $cite->Lieux = $request->Lieux;
        $cite->Quartier = $request->Quartier;
        $cite->Num_agence = $id;
        $cite->save();


        //Cite::create($request->all());

        return redirect()->route('cite.index', [$id])
            ->with('success', 'Cité créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $numcit
     * @return \Illuminate\Http\Response
     */
    public function edit($numcit)
    {
        $existCite = Cite::where('Num_cite', $numcit)->first();

        return view("CITE/modifCite", compact('existCite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, $id, Cite $cite)
    {
        $numCitee = $id;
        $validate =  $request->validate([

            'Nom_cite' => 'required',
            'Lieux' => 'required',
            'Quartier' => 'required',


        ]);

        $result = DB::table('cites')->where('Num_cite', $numCitee)->first();



        Cite::where('Num_cite', $numCitee)->update($validate);
        //$cite->update($request->all());
        return redirect()->route('cite.index', [$result->Num_agence])
            ->with('success', 'Cite modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::table('cites')->where('Num_cite', $id)->first();

        Cite::where('Num_cite', $id)->delete();
        return redirect()->route('cite.index', [$result->Num_agence])
            ->with('success', 'Cite modifier avec succès.');
    }
}
