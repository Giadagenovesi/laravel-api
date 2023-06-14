<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all()->paginate(10);
        return response()->json([
            'success'=> true, // non è obbligatorio, mi serve solo per dire che la chiamata è avvenuta con successo
            'results'=>$projects
        ]);
    }
}
