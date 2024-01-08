<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class listeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jointure = DB::table('clients')
            ->join('logements', 'clients.Id_cli', '=', 'logements.Id_cli')
            ->join('cites', 'logements.Num_cite', '=', 'cites.Num_cite')
            ->join('agences', 'cites.Num_agence', '=', 'agences.Num_agence')
            ->get();
        return view('/ACHAT/listeAchat', compact('jointure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $existLoge = DB::table('clients')
            ->join('logements', 'clients.Id_cli', '=', 'logements.Id_cli')
            ->join('cites', 'logements.Num_cite', '=', 'cites.Num_cite')
            ->join('agences', 'cites.Num_agence', '=', 'agences.Num_agence')
            ->where('Num_logement', $id)
            ->get();
        // create the number to words "manager" class
        $numberToWords = new NumberToWords();
        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $result = $numberTransformer->toWords($existLoge[0]->Prix_logement);
        return view('/ACHAT/showAchat', compact('existLoge', 'result'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function convert($id)
    {
        $existLoge = DB::table('clients')
            ->join('logements', 'clients.Id_cli', '=', 'logements.Id_cli')
            ->join('cites', 'logements.Num_cite', '=', 'cites.Num_cite')
            ->join('agences', 'cites.Num_agence', '=', 'agences.Num_agence')
            ->where('Num_logement', $id)
            ->get();

        // create the number to words "manager" class
        $numberToWords = new NumberToWords();
        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $result = $numberTransformer->toWords($existLoge[0]->Prix_logement);


        $pdf = PDF::loadView('/ACHAT/showAchat', ['existLoge' => $existLoge, 'result' => $result]);
        $pdf->setPaper('A4', 'Letter');
        return $pdf->download('nom_du_fichier.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logement = Logement::where('Num_logement', $id);
        $logement->update([
            "Id_cli" => 0,
            "Type_vente" => 'null'
        ]);

        return redirect()->route('liste.index');
    }
}
