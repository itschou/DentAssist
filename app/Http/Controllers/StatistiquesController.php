<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class StatistiquesController extends Controller
{



    public function index(Consultations $consultation, User $user)
    {
        $consultationsCount = $this->consultationsCounts();
        $totalArgentMois = $this->totalArgentsMoisCounts();
        $totalArgentAnne = $this->totalArgentsAnneeCounts();
        $totalArgents = $this->TotalArgentCounts();
        $data = $this->getTotalArgentByMonth();


        if(Auth::user()->role === "Docteur"){

            return view('statistiques.index', compact('consultation', 'user', 'consultationsCount', 'totalArgentMois', 'totalArgents', 'totalArgentAnne' , 'data'));
        }else{
            Alert::error('Erreur', "Désolé, vous n’êtes pas autorisé à accéder à cette page.")->showConfirmButton('OK');
            return to_route('home');
        }

    }

    public function consultationsCounts()
    {
        // Récupérer la date de début et de fin du mois en cours
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Compter les consultations effectuées ce mois
        $consultationsCount = Consultations::whereBetween('date', [$startOfMonth, $endOfMonth])->count();

        return $consultationsCount;
    }

    public function totalArgentsMoisCounts()
    {
        // Récupérer la date de début et de fin du mois en cours
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Calculer le total d'argent pour ce mois
        $totalArgentsCount = Consultations::whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('prix_payé_consultation');

        // Formater le total d'argent si la valeur dépasse 10 000
        if ($totalArgentsCount > 10000) {
            $totalArgentsCount = number_format($totalArgentsCount, 0, '.', '.');
        }

        return $totalArgentsCount;
    }

    public function totalArgentsAnneeCounts()
    {
        // Récupérer la date de début et de fin de l'année en cours
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        // Calculer le total d'argent pour cette année
        $totalArgentsCount = Consultations::whereBetween('date', [$startOfYear, $endOfYear])
            ->sum('prix_payé_consultation');

        // Formater le total d'argent si la valeur dépasse 10 000
        if ($totalArgentsCount > 10000) {
            $totalArgentsCount = number_format($totalArgentsCount, 0, '.', '.');
        }

        return $totalArgentsCount;
    }


    public function TotalArgentCounts()
    {

        $totalArgent = Consultations::pluck('prix_payé_consultation')->sum();

        // Formater le total d'argent si la valeur dépasse 10 000
        if ($totalArgent > 10000) {
            $totalArgent = number_format($totalArgent, 0, '.', '.');
        }

        return $totalArgent;
    }



    public function getTotalArgentByMonth()
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $consultations = Consultations::whereBetween('date', [$startOfYear, $endOfYear])
            ->orderBy('date', 'asc') // Tri par date en ordre croissant
            ->get();

        $data = $consultations->groupBy(function ($consultation) {
            return Carbon::parse($consultation->date)->format('M');
        })->map(function ($grouped) {
            return $grouped->sum('prix_payé_consultation');
        })->values()->toArray();

        return $data;
    }



}