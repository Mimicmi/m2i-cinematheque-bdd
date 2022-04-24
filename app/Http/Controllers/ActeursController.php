<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acteurs;

class ActeursController extends Controller
{
    public function display()
    {
        $acteurs = Acteurs::get();
        return response()->json($acteurs, 201);
    }

    public function details($id)
    {
        if (!$acteur = Acteurs::where('id_acteur', $id)) {
            return response()->json([
                'message' => 'Acteur non trouvé',
            ], 404);
        }
        return response()->json($acteur->get(), 201);
    }
}
