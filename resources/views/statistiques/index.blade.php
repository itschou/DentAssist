@extends('layouts.app')
@extends('components.navbar')




@section('content')
@section('content-navbar')
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-6">Statistiques</h2>

        <div class="grid grid-cols-2 gap-4">
            <div class="border p-4 bg-red-200">
                <h3 class="text-xl font-bold mb-2">Total des consultations</h3>
                <p class="text-3xl font-bold"> {{ count($consultation->all()) }} </p>
            </div>
            <div class="border p-4 bg-yellow-200">
                <h3 class="text-xl font-bold mb-2">Total généré</h3>
                <p class="text-3xl font-bold"> {{ $totalArgents }} DH</p>
            </div>
            <div class="border p-4 bg-green-200">
                <h3 class="text-xl font-bold mb-2">Total des consultations (ce mois)</h3>
                <p class="text-3xl font-bold"> {{ $consultationsCount }} </p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="border p-4 bg-blue-200">
                    <h3 class="text-xl font-bold mb-2">Total (ce mois)</h3>
                    <p class="text-3xl font-bold">{{ $totalArgentMois }} DH</p>
                </div>
                <div class="border p-4 bg-blue-200">
                    <h3 class="text-xl font-bold mb-2">Total (cette année)</h3>
                    <p class="text-3xl font-bold">{{ $totalArgentAnne }} DH</p>
                </div>
            </div>
            
            <div class="border p-4 bg-purple-200">
                <h3 class="text-xl font-bold mb-2">Nombre de clients Total</h3>
                <p class="text-3xl font-bold"> {{ count($user->all()) }} </p>
            </div>
            <div class="border p-4 bg-pink-200">
                <h3 class="text-xl font-bold mb-2">Graphique du total d'argent généré cette année</h3>
                <div class="h-64">
                    <canvas id="chartContainer" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('chartContainer').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
                    datasets: [{
                        label: 'Total d\'argent généré cette année',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1000
                            }
                        }
                    }
                }
            });
        </script>
    @endsection
@endsection
@endsection
