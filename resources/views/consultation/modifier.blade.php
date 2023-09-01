@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="bg-white shadow-md rounded-md px-8 pt-6 pb-8 mb-4">
        <form action=" {{ route('consultation.update', $consultation) }} " method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
                        Date
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="date" name="date" type="date" placeholder="date" value="{{ $consultation->date }}"
                        required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                        Type
                    </label>
                    {{-- <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="type" name="type_consultation" type="text" placeholder="Type" value="{{ $consultation->type_consultation }}"
                        required> --}}
                    <select name="type_consultation" id="type_consultation"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->nom }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="motif">
                        Motif
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="motif" name="motif_consultation" type="text"
                        value="{{ $consultation->motif_consultation }}" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prix">
                        Montant de la consultation
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="prix" name="prix_consultation" type="text" placeholder="Montant de la consultation"
                        value="{{ $consultation->prix_consultation }}" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prix_payé_consultation">
                        Montant payé par le client 
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="prix_payé_consultation" name="prix_payé_consultation" type="text" placeholder="Montant payé par le client "
                        value="{{ $consultation->prix_payé_consultation }}" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="procedures_effectué">
                        Procedures Effectué
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="procedures_effectué" name="procedures_effectué" type="text" placeholder="procedures effectué"
                        value="{{ $consultation->procedures_effectué }}" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prescription">
                        Prescription
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="prescription" name="prescription" type="text" placeholder="Prescription"
                        value="{{ $consultation->prescription }}" required>
                </div>
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="observation">
                        Observation
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="observation" name="observation" rows="3" placeholder="Observation">{{ $consultation->observation }}</textarea>
                </div>
            </div>
            <div class="flex items-center justify-center py-5">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Modifier la consultation
                </button>
            </div>
        </form>
    </div>
@endsection

@endsection