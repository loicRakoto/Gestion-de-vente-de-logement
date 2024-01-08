<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCli = client::all();
        $listLogement = Logement::where('Type_vente', 'null')->get();

        return view('/ACHAT/indexAchat', compact('listCli', 'listLogement'));
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
        $numLogement = $request->numLogement;
        $numClient = $request->numClient;
        $typePaye = $request->radioMethode;
        Logement::where('Num_logement', $request->numLogement)->update([
            "Id_cli" => $numClient,
            "Type_vente" => $typePaye
        ]);

        $existCli = client::where('Id_cli', $numClient);
        $existCli->update([
            'Date_achat' => date(now())
        ]);

        return redirect()->route('achat.index')->with('success', 'Achat effectuer');
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $NumLog = $request->Numlog;
        $NumCli = $request->NumCli;

        // $logementDispo = Logement::with('citee')->where('Num_logement', $NumLog)->first();
        //$existCli = client::where('Id_cli', $NumCli)->get();

        $users = DB::table('logements')
            ->join('cites', 'logements.Num_cite', '=', 'cites.Num_cite')
            ->join('agences', 'cites.Num_agence', '=', 'agences.Num_agence')
            ->where('Num_logement', $NumLog)
            ->get();

        return $users;
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function showCli(Request $request)
    {

        $NumCli = $request->NumCli;

        $existCli = client::where('Id_cli', $NumCli)->get();

        return $existCli;
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
        //
    }
}
