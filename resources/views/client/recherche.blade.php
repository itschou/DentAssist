@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="container mx-auto p-4">
        <h1 class="text-center text-lg font-bold mb-2">Ci-dessous la liste correspondant à votre recherche :</h1> <br>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2">Nom</th>
                    <th class="text-left px-4 py-2">Prénom</th>
                    <th class="text-left px-4 py-2">Date de naissance</th>
                    <th class="text-left px-4 py-2">Téléphone</th>
                    <th class="text-left px-4 py-2">Adresse</th>
                    <th class="text-left px-4 py-2">Email</th>
                    <th class="text-left px-4 py-2">Supprimer</th>
                    {{-- <th class="text-left px-4 py-2">Modifier</th>
                    <th class="text-left px-4 py-2">Consultation</th>
                    <th class="text-left px-4 py-2">Rendez-vous</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td class="border-t px-4 py-2">{{ $client->nom }}</td>
                        <td class="border-t px-4 py-2">{{ $client->prenom }}</td>
                        <td class="border-t px-4 py-2">{{ $client->Date_de_naissance }}</td>
                        <td class="border-t px-4 py-2">{{ $client->telephone }}</td>
                        <td class="border-t px-4 py-2">{{ $client->adresse }}</td>
                        <td class="border-t px-4 py-2">{{ $client->email }}</td>
                        <td class="border-t px-4 py-2">
                            <form action="{{ route('client.show', $client) }}" method="GET">
                            @csrf
                            <button class="bg-green-600 text-white rounded-md px-4 py-2">
                                Actions
                            </button>
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <input type="hidden" name="client_info" value="{{ $client->nom }} {{ $client->prenom }}">
                        </form></td>
                    @endforeach                          
                <!-- Ajoutez d'autres lignes de clients ici -->
            </tbody>
        </table>
        <br>
        {{ $clients->links() }}
        <br>
        <a href="{{ route('client.index') }}"><button class="bg-gray-700 text-white rounded-md px-4 py-2 text-center">
            Retourner au menu
        </button></a>
    </div>
@endsection

@endsection
