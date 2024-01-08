<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Agence;
use DateTimeImmutable;
use App\Models\Logement;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agence = Agence::all();

        return view("AGENCE/listAgence", compact("agence"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("AGENCE/formAgence");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'Libelle_agence' => 'required|max:255',
            'contact_agence' => 'required',
            'Adresse_agence' => 'required',
            'Email_agence' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',

        ]);
        $pathe = null;
        $fileName = null;

        if (!$request->hasFile('image')) {
            $pathe = '';
        } else {
            // $fileName = time() . '.' . $request->file('image')->extension();
            // $path = $request->file('image')->storeAs('images', $fileName, 'public');
            //$path = $request->file('image')->store('images', 'public');
            $fileName = $request->file('image')->getClientOriginalName();
        }



        if (Storage::disk('public')->exists($fileName)) {
            $pathe = $request->file('image')->storeAs('images', $fileName, 'public');
        } else {
            // Le fichier n'existe pas
            if (!$request->hasFile('image')) {
                $pathe = '';
            } else {
                // $fileName = time() . '.' . $request->file('image')->extension();
                // $path = $request->file('image')->storeAs('images', $fileName, 'public');
                //$path = $request->file('image')->store('images', 'public');
                $pathe = $request->file('image')->storeAs('images', $fileName, 'public');
            }
        }



        //Conversion de la date recuperer
        $date1 = $request->created_at;
        $date2 = new DateTimeImmutable($date1);
        $date = $date2->format('Y-m-d H:i:s');

        $agence = new Agence();
        $agence->Libelle_agence = $request->Libelle_agence;
        $agence->contact_agence = $request->contact_agence;
        $agence->Adresse_agence = $request->Adresse_agence;
        $agence->Email_agence = $request->Email_agence;
        $agence->created_at = $date;

        $agence->updated_at = $request->updated_at;
        $agence->imageAgence = $pathe;
        $agence->save();

        return redirect()->route('agence.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int id;
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence, $id)
    {
        $agenceExist = Agence::where('Num_agence', $id)->firstOrFail();
        //dd($agenceExist->created_at);
        return view("AGENCE/formModifAgence", compact("agenceExist"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agence $agence, $agenc)
    {


        $validated = $request->validate([
            'Libelle_agence' => 'required|max:255',
            'contact_agence' => 'required',
            'Adresse_agence' => 'required',
            'Email_agence' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',

        ]);
        $pathe = null;
        $fileName = null;

        if (!$request->hasFile('image')) {
            $pathe = '';
        } else {
            // $fileName = time() . '.' . $request->file('image')->extension();
            // $path = $request->file('image')->storeAs('images', $fileName, 'public');
            //$path = $request->file('image')->store('images', 'public');
            $fileName = $request->file('image')->getClientOriginalName();
        }

        if (Storage::disk('public')->exists($fileName)) {
            $pathe = $request->file('image')->storeAs('images', $fileName, 'public');
        } else {
            // Le fichier n'existe pas
            if (!$request->hasFile('image')) {
                $pathe = '';
            } else {
                // $fileName = time() . '.' . $request->file('image')->extension();
                // $path = $request->file('image')->storeAs('images', $fileName, 'public');
                //$path = $request->file('image')->store('images', 'public');
                $pathe = $request->file('image')->storeAs('images', $fileName, 'public');
            }
        }



        $AgenceExist = Agence::where('Num_agence', $agenc);
        $AgenceExist->update([
            'Libelle_agence' => $request->Libelle_agence,
            'contact_agence' => $request->contact_agence,
            'Adresse_agence'  => $request->Adresse_agence,
            'Email_agence' => $request->Email_agence,
            'created_at' => $request->created_at,
            'updated_at' => date(now()),
            'imageAgence' => $pathe

        ]);

        return redirect()->route('agence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence, $id)
    {
        // Agence::find($id);
        // $agence->delete();
        Agence::where('Num_agence', $id)->delete();
        return redirect()->route("agence.index");
    }
}
