@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="container mx-auto p-4">
        <div class="bg-green-600 text-white rounded-md p-4 mb-4">
            <h2 class="text-lg font-bold mb-2">Statistiques</h2>
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <i class="fas fa-users text-xl mr-2"></i>
                    <span class="font-bold">Nombre de consultations :</span>
                    <span class="ml-2"> {{ count($consultations->all()) }} </span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-user text-xl mr-2"></i>
                    <span class="font-bold">Derniere consultation :</span>
                    <span class="ml-2">{{ $consultations->get()->last()->user->nom }} {{ $consultations->get()->last()->user->prenom }}</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-xl mr-2"></i>
                    <span class="font-bold">Date d'aujourd'hui :</span>
                    <span class="ml-2"> {{ date('d m Y') }} </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-md p-4">
            <h2 class="text-lg font-bold mb-2">Gestion des consultations</h2>
            <div class="flex justify-end mb-4">
                <form action="{{ route('consultation.search') }}" method="GET" class="flex">
                    @csrf
                    <input type="text" name="search"
                        class="border border-gray-300 rounded-l-md py-2 px-4 focus:outline-none focus:ring-green-500 focus:border-green-500 flex-grow"
                        placeholder="Nom ou Prénom">
                    <button type="submit" class="bg-green-600 text-white rounded-r-md px-4 py-2">
                        Rechercher
                    </button>
                </form>
                {{-- <form action="{{ route('client.create') }}">
                    
                    <button type="submit" class="bg-green-600 text-white rounded-md px-4 py-2 ml-2">
                        Nouvelle consultation
                    </button>
                </form> --}}
            </div>


            <!-- Ajoutez votre tableau de clients ici -->
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-2">Date</th>
                        <th class="text-left px-4 py-2">Type</th>
                        <th class="text-left px-4 py-2">Motif</th>
                        <th class="text-left px-4 py-2">Prix de la consultation</th>
                        <th class="text-left px-4 py-2">Prix payé</th>
                        <th class="text-left px-4 py-2">Reste à payer</th>
                        <th class="text-left px-4 py-2">Client</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultationsList as $consultationsSelect)
                        <tr>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->date }}</td>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->type_consultation }}</td>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->motif_consultation }}</td>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->prix_consultation }} DH</td>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->prix_payé_consultation }} DH</td>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->prix_reste_consultation }} DH</td>
                            <td class="border-t px-4 py-2">{{ $consultationsSelect->user->nom }} {{ $consultationsSelect->user->prenom }}</td>
                        </tr>
                    @endforeach
                    <!-- Ajoutez d'autres lignes de clients ici -->
                </tbody>
            </table>
            <br>
            <h1 class="text-center">Liste des 5 dernieres consultations</h1>

        </div>
    </div>
@endsection

@endsection
