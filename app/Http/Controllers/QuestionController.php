<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $questions = Question::all();
    
            return response()->json([
                'status' => 'success',
                'message' => $questions
            ]);
        } catch (\Exception $e) { // Capturer toutes les exceptions
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching questions',
                'error' => $e->getMessage() // Affiche le message d'erreur
            ], 500); // Utiliser un code 500 pour les erreurs de serveur
        }
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
        //
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
