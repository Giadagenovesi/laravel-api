<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['technologies', 'type'])->paginate(10);
        return response()->json([
            'success'=> true, // non è obbligatorio, mi serve solo per dire che la chiamata è avvenuta con successo
            'results'=> $projects
        ]);
    }

    public function show($slug) {
        //metto first perchè non voglio tutti gli elementi, ma solo il primo
        $project = Project::with('technologies', 'type')->where('slug', $slug)->first();


        //se il progetto esiste mi da success true altrimenti mi restituisce false 
        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun post trovato'
            ])->setStatusCode(404); //mi restituisce errore 404 perchè la pagina non è stata trovata
        }
    }
}
