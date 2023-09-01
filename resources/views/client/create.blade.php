@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
<div class="max-w-lg mx-auto">
    <form action=" {{route('client.store')}} " method="POST">
        @CSRF
    <div class="bg-white shadow-md rounded-md px-8 pt-6 pb-8 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                    Nom
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nom" name="nom" type="text" placeholder="Nom" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                    Prénom
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="prenom" name="prenom" type="text" placeholder="Prénom" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_naissance">
                    Date de naissance
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="date_naissance" name="Date_de_naissance" type="date" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telephone">
                    Téléphone
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="telephone" name="telephone" type="tel" placeholder="Numéro de téléphone" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" type="email" placeholder="Email" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="adresse">
                    Adresse
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="adresse" name="adresse" type="text" placeholder="Adresse" required>
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="genre">
                    Genre
                </label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="genre" value="Homme" required>
                        <span class="ml-2">Homme</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="genre" value="Femme" required>
                        <span class="ml-2">Femme</span>
                    </label>
                </div>
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="maladies">
                    Maladies
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="maladies" name="maladies" rows="3" placeholder="Maladies"></textarea>
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="informations_suplementaires">
                    Informations supplémentaires
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="informations_suplementaires" name="informations_suplementaires" rows="3"
                    placeholder="Informations supplémentaires"></textarea>
            </div>
        </div>
        <div class="flex items-center justify-center py-5">
            
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                Ajouter le client
            </button>
        </div>
    </div>
</form>
</div>

@endsection

@endsection
