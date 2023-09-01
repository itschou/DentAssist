@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="container mx-auto p-4">
        <div class="bg-indigo-600 text-white rounded-md p-4 mb-4">
            <h2 class="text-lg font-bold mb-2">Statistiques</h2>
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <i class="fas fa-users text-xl mr-2"></i>
                    <span class="font-bold">Nombre de clients :</span>
                    <span class="ml-2"> {{ count($user->all()) }} </span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-user text-xl mr-2"></i>
                    <span class="font-bold">Dernier client :</span>
                    <span class="ml-2">{{ $user->pluck('nom')->last() }} {{ $user->pluck('prenom')->last() }} </span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-xl mr-2"></i>
                    <span class="font-bold">Date d'aujourd'hui :</span>
                    <span class="ml-2"> {{ date('d m Y') }} </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-md p-4">
            <h2 class="text-lg font-bold mb-2">Gestion des clients</h2>
            <div class="flex justify-end mb-4">
                <form action="{{ route('client.search') }}" method="GET" class="flex">
                    @csrf
                    <input type="text" name="search"
                        class="border border-gray-300 rounded-l-md py-2 px-4 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 flex-grow"
                        placeholder="Rechercher un client">
                    <button type="submit" class="bg-indigo-600 text-white rounded-r-md px-4 py-2">
                        Rechercher
                    </button>
                </form>
                <form action="{{ route('client.create') }}">
                    
                    <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2 ml-2">
                        Ajouter un client
                    </button>
                </form>
            </div>


            <!-- Ajoutez votre tableau de clients ici -->
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-2">Nom</th>
                        <th class="text-left px-4 py-2">Prénom</th>
                        <th class="text-left px-4 py-2">Date de naissance</th>
                        <th class="text-left px-4 py-2">Téléphone</th>
                        <th class="text-left px-4 py-2">Adresse</th>
                        <th class="text-left px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userList as $userSelect)
                        <tr>
                            <td class="border-t px-4 py-2">{{ $userSelect->nom }}</td>
                            <td class="border-t px-4 py-2">{{ $userSelect->prenom }}</td>
                            <td class="border-t px-4 py-2">{{ $userSelect->Date_de_naissance }}</td>
                            <td class="border-t px-4 py-2">{{ $userSelect->telephone }}</td>
                            <td class="border-t px-4 py-2">{{ $userSelect->adresse }}</td>
                            <td class="border-t px-4 py-2">{{ $userSelect->email }}</td>
                        </tr>
                    @endforeach
                    <!-- Ajoutez d'autres lignes de clients ici -->
                </tbody>
            </table>
            <br>
            <h1 class="text-center">Liste des 5 dernier clients</h1>

        </div>
    </div>
@endsection

@endsection
