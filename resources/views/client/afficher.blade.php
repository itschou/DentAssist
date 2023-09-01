@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <!-- Section des informations du client -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold mb-4">Informations du client</h2>
            <div class="flex items-center mb-2">
                <i class="bi bi-person-circle p-2"></i>
                <span class="text-lg font-medium">Nom et Prénom: </span>
                <span class="text-gray-700 px-2"> {{ $client->nom }} {{ $client->prenom }}</span>
            </div>
            <div class="flex items-center mb-2">
                <i class="bi bi-calendar-check p-2"></i>
                <span class="text-lg font-medium">Date de naissance: </span>
                <span class="text-gray-700 px-2"> {{ $client->Date_de_naissance }}</span>
            </div>
            <div class="flex items-center mb-2">
                <i class="bi bi-geo-alt-fill p-2"></i>
                <span class="text-lg font-medium">Adresse: </span>
                <span class="text-gray-700 px-2">{{ $client->adresse }}</span>
            </div>
            <div class="flex items-center">
                <i class="bi bi-telephone p-2"></i>
                <span class="text-lg font-medium">Téléphone: </span>
                <span class="text-gray-700 px-2">{{ $client->telephone }}</span>
            </div>
            <div class="flex items-center mt-2">
                <i class="bi bi-envelope-at p-2"></i>
                <span class="text-lg font-medium">Email: </span>
                <span class="text-gray-700 px-2">{{ $client->email }}</span>
            </div>
            <div class="flex items-center mt-2">
                <i class="bi bi-card-heading p-2"></i>
                <span class="text-lg font-medium">Maladies: </span>
                <span class="text-gray-700 px-2">{{ $client->maladies }}</span>
            </div>
            <div class="flex items-center mt-2">
                <i class="bi bi-clipboard2-plus p-2"></i>
                <span class="text-lg font-medium">Informations suplementaires: </span>
                <span class="text-gray-700 px-2">{{ $client->informations_suplementaires }}</span>
            </div>
        </div>

        <!-- Section des boutons -->
        <div class="flex justify-end">
            <form action="{{ route('client.destroy', $client) }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="block w-full text-left px-4 py-2 text-sm text-red-600 bg-red-100 hover:bg-red-200 hover:text-red-800"
                    role="menuitem">
                    Supprimer
                </button>
            </form>

            <form action="{{ route('client.edit', $client) }}" method="GET">
                @csrf
                <button
                    class="block w-full text-left px-4 py-2 text-sm text-yellow-600 bg-yellow-100 hover:bg-yellow-200 hover:text-yellow-800"
                    role="menuitem">
                    Modifier
                </button>
            </form>

            <form action="{{ route('consultation.create', $client) }}" method="GET">
                @csrf
                <button
                    class="block w-full text-left px-4 py-2 text-sm text-blue-600 bg-blue-100 hover:bg-blue-200 hover:text-blue-800"
                    role="menuitem">
                    Nouvelle consultation
                </button>
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <input type="hidden" name="client_info" value="{{ $client->nom }} {{ $client->prenom }}">
            </form>

            <form action="{{ route('rendez-vous.create', $client) }}" method="GET">
                @csrf
                <button
                    class="block w-full text-left px-4 py-2 text-sm text-green-600 bg-green-100 hover:bg-green-200 hover:text-green-800"
                    role="menuitem">
                    Nouveau rendez-vous
                </button>
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <input type="hidden" name="client_info" value="{{ $client->nom }} {{ $client->prenom }}">
            </form>

        </div>
    </div>
@endsection

@endsection
