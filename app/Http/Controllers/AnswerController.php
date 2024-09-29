<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Visitor;
use Illuminate\Support\Facades\Log;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Valider la requête
        $request->validate([
            'answer' => 'required|array|min:20|max:20',
            'answer.*' => 'required|string',
            'visitor_email' => 'required|string|email',
        ]); 
        

        // Récupérer le visiteur par email
        $visitor = Visitor::where('email', $request->input('visitor_email'))->first();

        // Vérifier si le visiteur existe
        if (!$visitor) {
            return response()->json(['status' => 'error', 'message' => 'Visiteur non trouvé'], 404);
        }

        $visitorId = $visitor->id;

        // Traiter les données validées
        foreach ($request->input('answer') as $index => $answer) {
            Answer::create([
                'visitors_id' => $visitorId,
                'questions_id' => $index + 1, // S'assurer que l'index correspond à l'ID de la question
                'answer' => $answer
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'Formulaire validé']);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Échec de la validation',
            'errors' => $e->validator->errors()
        ], 422);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
