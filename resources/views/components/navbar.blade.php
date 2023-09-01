<div class="flex h-100 h-screen">
    <!-- Partie gauche avec le dashboard -->
    <div class="w-1/4 bg-gray-200">
        <!-- Logo ou titre du dashboard -->
        <div class="py-4 px-6 bg-indigo-600 text-white">
            <h1 class="text-2xl font-bold">Mon Dashboard</h1>
            Rôle : <span class="text-green-500"> {{ Auth::user()->role}} </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <p class="text-red-500 hover:text-red-700">Deconnexion</p>
                </button>
            </form>
        </div>

        @if (Auth::user()->role === 'Docteur')
            <!-- Menu de navigation -->
            <nav class="flex-grow">
                <ul class="flex flex-col p-4">
                    <!-- Éléments du dashboard -->
                    <li class="py-2">
                        <a href=" {{ route('client.index') }} "
                            class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                            <img class="w-6 h-6 mr-2" src="{{ asset('images/client.png') }}" alt="Icône du client">
                            <span><button type="submit">Client</button></span>
                        </a>
                    </li>
                    <li class="py-2">
                        <a href=" {{ route('consultation.index') }} "
                            class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                            <img class="w-6 h-6 mr-2" src="{{ asset('images/consultation.png') }}"
                                alt="Icône du consultation">


                            <span>Consultation</span>
                        </a>
                    </li>
                    <li class="py-2">
                        <a href=" {{ route('rendez-vous.index') }} "
                            class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                            <img class="w-6 h-6 mr-2" src="{{ asset('images/rendezvous.png') }}"
                                alt="Icône du rendez-vous">
                            <span>Rendez-vous</span>
                        </a>
                    </li>
                    <li class="py-2"></li>
                    <li class="py-2">
                        <a href=" {{ route('statistique.index') }} "
                            class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                            <img class="w-6 h-6 mr-2" src="{{ asset('images/analysis.png') }}"
                                alt="Icône du statistique">
                            <span>Statistique</span>
                        </a>
                    </li>
                    <li class="py-2">
                        <a href=" {{ route('categorie.index') }} "
                            class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                            <img class="w-6 h-6 mr-2" src="{{ asset('images/options2.png') }}" alt="Icône du catégorie">
                            <span>Catégories</span>
                        </a>
                    </li>
                </ul>
            </nav>
    </div>
@else
    <!-- Menu de navigation -->
    <nav class="flex-grow">
        <ul class="flex flex-col p-4">
            <!-- Éléments du dashboard -->
            <li class="py-2">
                <a href=" {{ route('client.index') }} "
                    class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                    <img class="w-6 h-6 mr-2" src="{{ asset('images/client.png') }}" alt="Icône du client">
                    <span><button type="submit">Client</button></span>
                </a>
            </li>
            <li class="py-2">
                <a href=" {{ route('consultation.index') }} "
                    class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                    <img class="w-6 h-6 mr-2" src="{{ asset('images/consultation.png') }}" alt="Icône du consultation">


                    <span>Consultation</span>
                </a>
            </li>
            <li class="py-2">
                <a href=" {{ route('rendez-vous.index') }} "
                    class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                    <img class="w-6 h-6 mr-2" src="{{ asset('images/rendezvous.png') }}"
                        alt="Icône du rendez-vous">
                    <span>Rendez-vous</span>
                </a>
            </li>
            <li class="py-2"></li>
            <li class="py-2">
                <a href=" {{ route('categorie.index') }} "
                    class="flex items-center text-gray-700 hover:bg-gray-300 py-1.5 px-2 rounded">
                    <img class="w-6 h-6 mr-2" src="{{ asset('images/options2.png') }}" alt="Icône du catégorie">
                    <span>Catégories</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
@endif



<!-- Partie droite avec contenu Laravel -->
<div class="flex-grow p-6">
    <!-- Contenu Laravel -->
    @yield('content-navbar')
    {{-- <x-navbar/> --}}
    <!-- Ajoutez votre contenu ici -->
</div>
</div>
