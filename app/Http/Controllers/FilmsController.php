<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use Illuminate\Support\Facades\DB;

class FilmsController extends Controller
{
    public function display()
    {
        $films = Films::get();
        return response()->json($films, 201);
    }

    public function onAime()
    {
        $films = Films::where('a_la_une', 1)->get();
        return response()->json($films, 201);
    }

    public function details($id)
    {
        if (!$film = Films::where('id_film', $id)) {
            return response()->json([
                'message' => 'Film non trouvé'
            ], 404);
        }
        return response()->json($film->get(), 201);
    }

    public function create(Request $request)
    {
        $request->validate([
            'titre' => "nullable|string",
            'synopsis' => "nullable|string",
            'date_de_sortie' => "nullable|string",
            'duree' => "nullable|string",
            'affiche' => "nullable|string",
            'video_film' => "nullable|string",
            'a_la_une' => "nullable|boolean"
        ]);
        $film = new Films([
            'titre' => $request->titre,
            'synopsis' => $request->synopsis,
            'date_de_sortie' => $request->date_de_sortie,
            'duree' => $request->duree,
            'affiche' => $request->affiche,
            'video_film' => $request->video_film,
            'a_la_une' => $request->a_la_une
        ]);
        $film->save();
        return response()->json([
            'message' => 'Film ajouté avec succès'
        ], 201);
    }

    public function update(Request $request, $id_film)
    {
        $request->validate([
            'titre' => "nullable|string",
            'synopsis' => "nullable|string",
            'date_de_sortie' => "nullable|string",
            'duree' => "nullable|string",
            'affiche' => "nullable|string",
            'video_film' => "nullable|string",
            'a_la_une' => "nullable|boolean"
        ]);
        $film = Films::find($id_film)->get();
        $film->titre = $request->titre;
        $film->synopsis = $request->synopsis;
        $film->date_de_sortie = $request->date_de_sortie;
        $film->duree = $request->duree;
        $film->affiche = $request->affiche;
        $film->video_film = $request->video_film;
        $film->a_la_une = $request->a_la_une;
        $film->save();
        return response()->json([
            'message' => 'Film mis à jour'
        ], 201);
    }
}
