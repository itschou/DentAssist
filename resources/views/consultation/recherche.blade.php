@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="container mx-auto p-4 ">
        <h1 class="text-center text-lg font-bold mb-2">Ci-dessous la liste correspondant à votre recherche :</h1> <br>
        <table class="min-w-full ">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2">Date</th>
                    <th class="text-left px-4 py-2">Type</th>
                    <th class="text-left px-4 py-2">Motif</th>
                    <th class="text-left px-4 py-2">Prix de la consultation</th>
                    <th class="text-left px-4 py-2">Prix payé</th>
                    <th class="text-left px-4 py-2">Reste à payer</th>
                    <th class="text-left px-4 py-2">Procedures Effectué</th>
                    <th class="text-left px-4 py-2">Prescription</th>
                    <th class="text-left px-4 py-2">observation</th>
                    <th class="text-left px-4 py-2">Client</th>
                    <th class="text-left px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $consultation)
                    <tr>
                        <td class="border-t px-4 py-2">{{ date('d m Y', strtotime($consultation->date)) }}</td>
                        <td class="border-t px-4 py-2">{{ $consultation->type_consultation }}</td>
                        <td class="border-t px-4 py-2">{{ $consultation->motif_consultation }}</td>
                        <td class="border-t px-4 py-2">{{ $consultation->prix_consultation }} DH</td>
                        <td class="border-t px-4 py-2">{{ $consultation->prix_payé_consultation }} DH</td>
                        <td class="border-t px-4 py-2">{{ $consultation->prix_reste_consultation }} DH</td>
                        <td class="border-t px-4 py-2">{{ $consultation->procedures_effectué }}</td>
                        <td class="border-t px-4 py-2">{{ $consultation->prescription }}</td>
                        <td class="border-t px-4 py-2">{{ $consultation->observation }}</td>
                        <td class="border-t px-4 py-2">{{ $consultation->user->nom }} {{ $consultation->user->prenom }}</td>
                        <td class="border-t px-4 py-2">
                            <form action="{{ route('consultation.destroy', $consultation) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white rounded-md px-4 py-2">
                                    Supprimer
                                </button>
                            </form>
                            <form action="{{ route('consultation.edit', $consultation) }}" method="GET">
                                @csrf
                                <button class="bg-green-600 text-white rounded-md px-4 py-2">
                                    Modifier
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- Ajoutez d'autres lignes de clients ici -->
            </tbody>
        </table>
        <br>
        {{ $consultations->links() }}
        <br>
        <a href="{{ route('consultation.index') }}"><button class="bg-gray-700 text-white rounded-md px-4 py-2 text-center">
            Retourner au menu
        </button></a>
    </div>
@endsection

@endsection
