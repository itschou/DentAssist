@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
<div class="max-w-lg mx-auto">
    <form action=" {{route('categorie.update', $categorie)}} " method="POST">
        @csrf
        @method('PUT')
        <br>
        <br>
        <br>
        <br>
    <div class="bg-white shadow-md rounded-md px-8 pt-6 pb-8 mb-4 grid place-items-center">
        <div class="gap-4 text-center ">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                    Nom
                </label>
                <input class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nom" name="nom" type="text" placeholder="Nom" value="{{ $categorie->nom }}" required>
            </div>
        </div>
        <div class="flex items-center justify-center py-5">
            
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                Modifier la categorie
            </button>
        </div>
    </div>
</form>
</div>

@endsection

@endsection
