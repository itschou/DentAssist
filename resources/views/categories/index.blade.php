@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="container mx-auto p-4">
        <div class="bg-purple-600 text-white rounded-md p-4 mb-4">
            <h2 class="text-lg font-bold mb-2">Statistiques</h2>
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <i class="fas fa-users text-xl mr-2"></i>
                    <span class="font-bold">Nombre de catégories :</span>
                    <span class="ml-2"> {{ count($categories->all()) }} </span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-xl mr-2"></i>
                    <span class="font-bold">Date d'aujourd'hui :</span>
                    <span class="ml-2"> {{ date('d m Y') }} </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-md p-4">
            <h2 class="text-lg font-bold mb-2">Gestion des catégories</h2>
            <div class="flex justify-end mb-4">
                <form action="{{ route('categorie.create') }}">
                    
                    <button type="submit" class="bg-purple-600 text-white rounded-md px-4 py-2 ml-2">
                        Nouvelle catégorie
                    </button>
                </form>
            </div>


            <!-- Ajoutez votre tableau de clients ici -->
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-2">Identifiant</th>
                        <th class="text-left px-4 py-2">Nom de la catégorie</th>
                        <th class="text-left px-4 py-2">Modifier la catégorie</th>
                        <th class="text-left px-4 py-2">Supprimer la catégorie</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoriesList as $categoriesSelect)
                        <tr>
                            <td class="border-t px-4 py-2">{{ $categoriesSelect->id }}</td>
                            <td class="border-t px-4 py-2">{{ $categoriesSelect->nom }}</td>
                            <td class="border-t px-4 py-2">
                                <form action="{{ route('categorie.edit', $categoriesSelect) }}" method="GET">
                                    @csrf
                                    <button class="bg-green-600 text-white rounded-md px-4 py-2">
                                        Modifier
                                    </button>
                                </form>
                            </td>
                            <td class="border-t px-4 py-2">
                                <form action="{{ route('categorie.destroy', $categoriesSelect) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white rounded-md px-4 py-2">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Ajoutez d'autres lignes de clients ici -->
                </tbody>
            </table>
            <br>

        </div>
    </div>
@endsection

@endsection
