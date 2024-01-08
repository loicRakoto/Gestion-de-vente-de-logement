<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use LDAP\Result;

class ClientController extends Controller
{
    /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(client $cli)

    {
        $result = $cli->all();

        return view('CLIENT/listCli', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(client $cli)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, client $cli)
    {
        $donnee = $request->validate([

            'Nom' => 'required',
            'Prenom' => 'required',
            'Tel' => 'required',
            'CIN' => 'required',
            'Lieux' => 'required',

        ]);
        $cli->Nom_cli = $request->Nom;
        $cli->Prenom_cli = $request->Prenom;
        $cli->Tel_cli = $request->Tel;
        $cli->CIN_cli = $request->CIN;
        $cli->Lieux_travail = $request->Lieux;
        $cli->Date_achat = date(now());

        if ($request->status == null) {
            $cli->save();
            return redirect()->route('client.index')->with('success', 'Client ajouter avec succes');
        } else {

            $cliExist = client::where('Id_cli', $request->status);
            $cliExist->update([
                'Nom_cli' => $request->Nom,
                'Prenom_cli' => $request->Prenom,
                'Tel_cli' => $request->Tel,
                'CIN_cli' => $request->CIN,
                'Lieux_travail' => $request->Lieux,
                'Date_achat' => date(now())
            ]);
            return redirect()->route('client.index')->with('success', 'Client modifier avec succes');
        }





        // $cli->create($donnee);

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
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $existCli = client::where('Id_cli', $id)->get();
        return $existCli;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        client::where('Id_cli', $id)->delete();
        return redirect()->route('client.index')->with('success', 'Suppression réussie');
    }
}
