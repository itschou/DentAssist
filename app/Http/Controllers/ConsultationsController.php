<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Consultations;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Consultations $consultations)
    {
        $consultationsList = $consultations->latest('id')->skip(1)->paginate(5);
        return view('consultation.index', compact('consultations', 'consultationsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Consultations $consultations, User $client, Request $request, Categories $categorie)
    {
        $clientId = $request->input('client_id');
        $client = $request->input('client_info');
        $categories = $categorie->all();
        return view('consultation.create', compact('clientId', 'client', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Consultations $consultations, Request $request)
    {

        $userId = $request->input('clientId');

        try {

            $consultations->create([
                'date' => now(),
                'type_consultation' => $request->type_consultation,
                'motif_consultation' => $request->motif_consultation,
                'prix_consultation' => (float)$request->prix_consultation,
                'prix_payé_consultation' => (float)$request->prix_payé_consultation,
                'prix_reste_consultation' => (float)$request->prix_consultation - (float)$request->prix_payé_consultation,
                'procedures_effectué' => $request->procedures_effectué,
                'prescription' => $request->prescription,
                'observation' => $request->observation,
                'user_id' => (int)$userId,
    
            ]);
            Alert::success('Succès', 'La consultation a été ajouté avec succès.')->showConfirmButton('OK');
            return to_route('consultation.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la création de la consultation" . $th)->showConfirmButton('OK');
            return to_route('consultation.index');

        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultations $consultations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultations $consultation, Categories $categorie)
    {
        // dd('test');
        $consultationsGet = $consultation;
        $categories = $categorie->all();
        return view('consultation.modifier', compact('consultation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultations $consultation)
    {
        try {

            $consultation->update($request->all());
            Alert::success('Succès', 'La consultation a été modifié avec succès')->showConfirmButton('OK');
            return to_route('consultation.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la modification de la consultation" . $th)->showConfirmButton('OK');
            return to_route('consultation.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultations $consultation)
    {
        try {

            $consultation->delete();
            Alert::success('Succès', 'La consultation a été supprimé avec succès')->showConfirmButton('OK');
            return to_route('consultation.index');

        } catch (\Throwable $th) {
            Alert::error('Erreur', "Une erreur s'est produite.")->showConfirmButton('OK');
            return to_route('consultation.index');

        }
    }


    public function search(Request $request){
        $searchTerm = $request->input('search');


        $users = User::where('nom', 'LIKE', $searchTerm . '%')->orWhere('prenom', 'LIKE', $searchTerm . '%')->pluck('id');;
        $consultations = Consultations::whereIn('user_id', $users)->paginate(10);
        // dd($consultations);

        return view('consultation.recherche', ['consultations' => $consultations, 'recherche' => $searchTerm]);
    }
}
