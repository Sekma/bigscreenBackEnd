<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Str;

class VisitorController extends Controller
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
                    'name' => 'required',
                    'email' => 'required|email|unique:visitors,email', // Vérifier que l'email est unique
                ]);
        
                // Générer une référence aléatoire
                $reference = Str::random(32);
                
                // Créer l'enregistrement du visiteur
                Visitor::create(array_merge($request->all(), ['reference' => $reference]));
        
                return response()->json([
                    'status' => 'success',
                    'message' => 'Visitor created successfully'
                ]);
                
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Echec de validation, vérifier votre E-mail',
                    'errors' => $e->validator->errors() // Retourner les erreurs de validation
                ], 422); // Code d'état HTTP pour les erreurs de validation
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
    public function destroy(string $email)
    {
        $visitor = Visitor::where('email', $email)->first();
        
        if(!$visitor){
            return response()->json([
                'status' => 'error',
                'message' => 'visitor not found'
            ]);
        }else{
            $visitor->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'delete visitor successfully'
            ]);
        }
    }
}
