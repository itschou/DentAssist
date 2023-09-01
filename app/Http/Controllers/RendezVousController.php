<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RendezVousController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Rendezvous $rendezvous)
    {
        $rendezvousList = $rendezvous->latest('id')->skip(1)->paginate(5);
        return view('rendezvous.index', compact('rendezvous', 'rendezvousList'));
    }

    public function create(Request $request, Rendezvous $rendezvous, User $client){

        $clientInfo = $request->input('client_info');
        $clientId = $request->input('client_id');
        $clientGet = User::findOrFail((int)$clientId);
        return view('rendezvous.create', compact('rendezvous', 'clientInfo', 'clientGet', 'client'));

    }

    public function store(Request $request){

        $userId = $request->input('client_id');
        $clientId = $request->input('client_id');
        // $clientGet = User::findOrFail((int)$clientId);

        try {

            Rendezvous::create([
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'user_id' => (int)$clientId,
    
            ]);
            Alert::success('Succès', 'Le rendez-vous a été ajouté avec succès.')->showConfirmButton('OK');
            return to_route('rendez-vous.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la création du rendez-vous" . $th)->showConfirmButton('OK');
            return to_route('rendez-vous.index');

        }
    }

    public function edit(Rendezvous $appoitment, Request $request)
    {
        $clientId = $request->input('client_id');
        $rendezvous_id = $request->input('rendez_vous_id');

        $clientGet = User::findOrFail((int)$clientId);
        $rendezvousGet = Rendezvous::findOrFail((int)$rendezvous_id);


        return view('rendezvous.modifier', compact( 'clientGet', 'rendezvousGet'));
    }


    public function update(Request $request){

        $rendezvousID = $request->input('rendezvous_id');
        $rendezvousGet = Rendezvous::findOrFail((int)$rendezvousID);


        try {

            $rendezvousGet->update($request->all()); 
            Alert::success('Succès', 'Le rendez-vous a été modifié avec succès.')->showConfirmButton('OK');
            return to_route('rendez-vous.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la modification du rendez-vous" . $th)->showConfirmButton('OK');
            return to_route('rendez-vous.index');

        }
    }
    

    public function search(Request $request){
        $searchTerm = $request->input('search');


        $users = User::where('nom', 'LIKE', $searchTerm . '%')->orWhere('prenom', 'LIKE', $searchTerm . '%')->pluck('id');;
        $appoitments = Rendezvous::whereIn('user_id', $users)->paginate(10);
        // dd($consultations);

        return view('rendezvous.recherche', ['appoitments' => $appoitments, 'recherche' => $searchTerm]);
    }


    public function destroy($id)
    {
        try {

            $rendezvous = Rendezvous::findOrFail((int)$id);
            $rendezvous->delete();
            Alert::success('Succès', 'Le rendez-vous a été supprimé avec succès')->showConfirmButton('OK');
            return to_route('rendez-vous.index');

        } catch (\Throwable $th) {
            Alert::error('Erreur', "Une erreur s'est produite.")->showConfirmButton('OK');
            return to_route('rendez-vous.index');

        }
    }

    public function showCalendar(){
        $rendezvousAll = Rendezvous::with('user')->get();
        $events = [];
 
        foreach ($rendezvousAll as $rendezvous) {
            $rendezvous->load('user'); // Charger la relation "client"
        
            $events[] = [
                'title' => '(' . $rendezvous->user->nom . ' ' .$rendezvous->user->prenom . ')',
                'start' => $rendezvous->date_debut,
                'end' => $rendezvous->date_fin,
            ];
        }
 
        return view('rendezvous.show', compact('events'));
    }
}
