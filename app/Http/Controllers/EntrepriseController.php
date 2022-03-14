<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{


    public function index(){
        return view('entreprise.index', [
            'entreprises' => Entreprise::with('quartier')->get()
        ]);
    }

    public function create(){
        return view('entreprise.create', [
            'quartiers' => Quartier::all()
        ]);
    }

    public function store(Request $request){

        //insertion dans la base
        $inputsData = $request->all();
        $inputsData['dispositifFormation'] = $request->has('dispositifFormation') ;
        $inputsData['organigramme'] = $request->has('organigramme') ;
        $inputsData['cotisationSociale'] = $request->has('cotisationSociale');
        $inputsData['contrat'] = $request->has('contrat') ;

        Entreprise::create($inputsData);
       
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
        dd($entreprise);
        // dd($entreprise->nom);
        // if ($entreprise) {
        //     return view('entreprise.edit',[
        //         'entreprise' => $entreprise,
        //         'quartiers' =>Quartier::all()
        //     ]);
        // }
        // return view('entreprise.edit', [
        //     'entreprise' => $entreprise
        // ]);
    }
}
