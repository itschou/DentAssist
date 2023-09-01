<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $userList = $user->latest('id')->skip(1)->paginate(5);
        return view('client.index', compact('user', 'userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, Request $request)
    { 
        try {

            $user->create($request->all());
            Alert::success('Succès', 'Le client a été ajouté avec succès')->showConfirmButton('OK');
            return to_route('client.index');

        }catch(\Throwable $th) {

            Alert::error('Erreur', "Une erreur s'est produite lors de l'ajout du client" . $th)->showConfirmButton('OK');
            return to_route('client.index');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $client)
    {

        return view('client.afficher', compact('client'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {
        $clientGet = $client;
        return view('client.modifier', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $client)
    {
        try {

            $client->update($request->all());
            Alert::success('Succès', 'Le client a été modifié avec succès')->showConfirmButton('OK');
            return to_route('client.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la modification du client" )->showConfirmButton('OK');
            return to_route('client.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(User $client)
    {

        try {

            $client->delete();
            Alert::success('Succès', 'Le client a été supprimé avec succès')->showConfirmButton('OK');
            return to_route('client.index');

        } catch (\Throwable $th) {
            Alert::error('Erreur', "Une erreur s'est produite, vérifier que votre client n'a aucune consultation.")->showConfirmButton('OK');
            return to_route('client.index');

        }
        
    }


    public function search(Request $request){
        $searchTerm = $request->input('search');

        $clients = User::where('nom', 'LIKE', $searchTerm . '%')->orWhere('prenom', 'LIKE', $searchTerm . '%')->paginate(5);


        return view('client.recherche', ['clients' => $clients, 'recherche' => $searchTerm]);
    }
}
