<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
    public function index(Categories $categories){

        $categoriesList = $categories->latest('id')->skip(1)->paginate(5);
        return view('categories.index', compact('categories', 'categoriesList'));

    }

    public function create(){
        return view('categories.create');
    }


    public function store(Request $request){
        try {

            Categories::create($request->all());
            Alert::success('Succès', 'La catégorie a été ajouté avec succès.')->showConfirmButton('OK');
            return to_route('categorie.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la création de la catégorie" . $th)->showConfirmButton('OK');
            return to_route('categorie.index');

        }
        
    }

    public function edit(Categories $categorie){

        return view('categories.modifier', compact('categorie'));

    }

    public function update(Request $request, Categories $categorie){
        try {

            $categorie->update($request->all());
            Alert::success('Succès', 'La catégorie a été modifié avec succès.')->showConfirmButton('OK');
            return to_route('categorie.index');

        } catch (\Throwable $th) {
            
            Alert::error('Erreur', "Une erreur s'est produite lors de la modification de la catégorie" . $th)->showConfirmButton('OK');
            return to_route('categorie.index');

        }
        
    }

    public function destroy(Categories $categorie)
    {

        try {

            $categorie->delete();
            Alert::success('Succès', 'La catégorie a été supprimé avec succès')->showConfirmButton('OK');
            return to_route('categorie.index');

        } catch (\Throwable $th) {
            Alert::error('Erreur', "Une erreur s'est produite." . $th)->showConfirmButton('OK');
            return to_route('categorie.index');

        }
        
    }
}
