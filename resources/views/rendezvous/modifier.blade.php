@extends('layouts.app')
@extends('components.navbar')

@section('content')

@section('content-navbar')
    <div class="max-w-md mx-auto">
        <form action="{{ route('rendez-vous.update', $rendezvousGet) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_debut">
                    Date de début
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="date_debut" type="datetime-local" placeholder="Date de début" name="date_debut" value="{{$rendezvousGet->date_debut}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_fin">
                    Date de fin
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="date_fin" type="datetime-local" placeholder="Date de fin" name="date_fin" value="{{$rendezvousGet->date_fin}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="client">
                    Client
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="client" type="text" placeholder="client" name="client" value="{{ $clientGet->nom }} {{ $clientGet->prenom }}" disabled>
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Modifier rendez-vous
                </button>
            </div>
            <input type="hidden" name="rendezvous_id" value="{{ $rendezvousGet->id }}">
            <input type="hidden" name="client_info" value="{{ $clientGet->nom }} {{ $clientGet->prenom }}">
        </form>
    </div>
@endsection

@endsection
