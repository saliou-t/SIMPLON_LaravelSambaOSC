<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{

    function __construct()
    {
        //  $this->middleware('permission:entreprise-list|entreprise-create|entreprise-edit|entreprise-delete', ['only' => ['index']]);
        //  $this->middleware('permission:entreprise-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:entreprise-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:entreprise-delete', ['only' => ['destroy']]);
    }

    public function index(){
        return view('entreprise.index', [
            'entreprises' => Entreprise::all()
        ]);
    }

    public function create(){
        return view('entreprise.create', [
            'quartiers' => Quartier::all()
        ]);
    }

    public function store(Request $request, Entreprise $entreprise = null){

        //insertion dans la base
        $inputsData = $request->all();
        $inputsData['dispositifFormation'] = $request->has('dispositifFormation') ;
        $inputsData['organigramme'] = $request->has('organigramme') ;
        $inputsData['cotisationSociale'] = $request->has('cotisationSociale');
        $inputsData['contrat'] = $request->has('contrat') ;
        Entreprise::create($inputsData);

        //on fait une redirection
        return redirect()->route('entreprise.index');
    }

    public function delete($id){
        $entreprise = Entreprise::find($id);

        if ($entreprise) {
            Entreprise::where('id', $id)->delete();
        }
        else {
            echo "L'entreprise n° $id n'existe pas ";
        }
        return redirect()->route('entreprise.index');
    }

    public function edit(Entreprise $entreprise){
        return view('entreprise.edit', [
            'entreprise' => $entreprise,
            'quartiers' => Quartier::all()
        ]);
    }

    public function update(Request $request, $id){
        $entreprise = Entreprise::find($id);
        // dd($entreprise);
        $entreprise->nom = $request->input('nom');
        $entreprise->siege = $request->input('siege');
        $entreprise->dateCreation = $request->input('dateCreation');
        $entreprise->telephone = $request->input('telephone');
        $entreprise->registre = $request->input('registre');
        $entreprise->ninea = $request->input('ninea');
        $entreprise->siteWeb = $request->input('siteWeb');
        $entreprise->dispositifFormation = $request->has('dispositifFormation');
        $entreprise->cotisationSociale = $request->has('cotisationSociale');
        $entreprise->organigramme = $request->has('organigramme');
        $entreprise->contrat = $request->has('contrat');
        $entreprise->quartier_id = $request->input('quartier_id');

        $entreprise->update();

        return redirect()->route('entreprise.index');
        // return redirect()->back()->with('status','Student Updated Successfully');
    }

}
