@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="bg-blue-500 p-4 rounded-lg">
        <h2 class="text-white text-lg font-bold mb-4">Gestion des rendez-vous</h2>
        <div class="flex justify-between">
            <a href=" {{ route('rendezvous.showCalendar') }} ">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Consulter les rendez-vous
                </button>
            </a>
            <a href=" {{ route('client.index') }} ">
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Ajouter un rendez-vous
                </button>
            </a>
        </div>
        <form action=" {{ route('rendezvous.search') }} ">
            <div class="mt-4 flex">

                <input type="text" placeholder="Rechercher un client..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2" name="search">
                <button class="ml-2 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Rechercher
                </button>
            </div>
        </form>


    </div>

    <br>

    <!-- Ajoutez votre tableau de clients ici -->
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="text-left px-4 py-2">Client</th>
                <th class="text-left px-4 py-2">Début de la consultation</th>
                <th class="text-left px-4 py-2">Fin de la consultation</th>
                <th class="text-left px-4 py-2">Temps de la consultation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rendezvousList as $rendezvous)
                @php
                    
                    $dateDebut = Carbon::parse($rendezvous->date_debut);
                    $dateFin = Carbon::parse($rendezvous->date_fin);
                    $duree = $dateFin->diffInMinutes($dateDebut);
                @endphp
                <tr>
                    <td class="border-t px-4 py-2">{{ $rendezvous->user->nom }} {{ $rendezvous->user->prenom }}</td>
                    <td class="border-t px-4 py-2">{{ $rendezvous->date_debut }}</td>
                    <td class="border-t px-4 py-2">{{ $rendezvous->date_fin }}</td>
                    <td class="border-t px-4 py-2">{{ $duree }} minutes</td>
                </tr>
            @endforeach
            <!-- Ajoutez d'autres lignes de clients ici -->
        </tbody>
    </table>
    <br>
    <h1 class="text-center">Liste des 5 derniers rendez-vous </h1>
@endsection

@endsection
