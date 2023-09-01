@php
    use Carbon\Carbon;
@endphp
@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="container mx-auto p-4 ">
        <h1 class="text-center text-lg font-bold mb-2">Ci-dessous la liste correspondant à votre recherche :</h1> <br>
        <table class="min-w-full ">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2">Client</th>
                    <th class="text-left px-4 py-2">Début de la consultation</th>
                    <th class="text-left px-4 py-2">Fin de la consultation</th>
                    <th class="text-left px-4 py-2">Temps de la consultation</th>
                    <th class="text-left px-4 py-2">Supprimer</th>
                    <th class="text-left px-4 py-2">Modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appoitments as $appoitment)
                @php
                    
                    $dateDebut = Carbon::parse($appoitment->date_debut);
                    $dateFin = Carbon::parse($appoitment->date_fin);
                    $duree = $dateFin->diffInMinutes($dateDebut);
                @endphp
                    <tr>
                        <td class="border-t px-4 py-2">{{ $appoitment->user->nom }} {{ $appoitment->user->prenom }}</td>
                        <td class="border-t px-4 py-2">{{ $appoitment->date_debut }}</td>
                        <td class="border-t px-4 py-2">{{ $appoitment->date_fin }}</td>
                        <td class="border-t px-4 py-2">{{ $duree }} minutes</td>
                        <td class="border-t px-4 py-2">
                            <form action="{{ route('rendez-vous.destroy', $appoitment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white rounded-md px-4 py-2">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                        <td class="border-t px-4 py-2">
                            <form action="{{ route('rendez-vous.edit', $appoitment) }}" method="GET">
                                @csrf
                                <button class="bg-green-600 text-white rounded-md px-4 py-2">
                                    Modifier
                                </button>
                                <input type="hidden" name="client_id" value="{{ $appoitment->user->id }}">
                                <input type="hidden" name="rendez_vous_id" value="{{ $appoitment->id }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- Ajoutez d'autres lignes de clients ici -->
            </tbody>
        </table>
        <br>
        {{ $appoitments->links() }}
        <br>
        <a href="{{ route('rendez-vous.index') }}"><button class="bg-gray-700 text-white rounded-md px-4 py-2 text-center">
            Retourner au menu
        </button></a>
    </div>
@endsection

@endsection
