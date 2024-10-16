<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use App\Models\Visitor;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Récupérer toutes les réponses avec jointures
            $answers = Answer::join('questions', 'answers.questions_id', '=', 'questions.id')
                ->join('visitors', 'answers.visitors_id', '=', 'visitors.id')
                ->select('questions.id as question_id', 'questions.question', 'answers.*', 'visitors.name as visitor')
                ->orderBy('answers.visitors_id') // Trier par visitor_id
                ->get();
    
            return response()->json([
                'status' => 'success',
                'message' => $answers
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching answers.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function statistical(string $id)
    {
        try {
            // Récupérer toutes les réponses avec jointures
            $answers = Answer::join('questions', 'answers.questions_id', '=', 'questions.id')
            ->select('answer', DB::raw('COUNT(*) as answer_count'))
            ->where('questions_id', $id)
            ->groupBy('answer')
            ->get();
            
    
            return response()->json([
                'status' => 'success',
                'message' => $answers
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching answers.',
                'error' => $e->getMessage()
            ], 500);
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
        $visitorRef = $visitor->reference;

        // Traiter les données validées
        foreach ($request->input('answer') as $index => $answer) {
            Answer::create([
                'visitors_id' => $visitorId,
                'questions_id' => $index + 1, // S'assurer que l'index correspond à l'ID de la question
                'answer' => $answer
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à 
                                                                    votre investissement, nous vous préparons une application toujours plus 
                                                                    facile à utiliser, seul ou en famille. 
                                                                    Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez 
                                                                    cette adresse: ',
                                                                'reference' => $visitorRef]);

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
    public function show(string $ref)
    {
        // Trouver le visiteur par sa référence
        $visitor = Visitor::where('reference', $ref)->first();
        
        if (!$visitor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Visiteur non trouvé.'
            ], 404);
        }
    
        // Récupérer les réponses associées par l'id de visiteur
        $answers = Answer::where('visitors_id', $visitor->id)
        ->join('questions', 'answers.questions_id', '=', 'questions.id') // Jointure sur l'id de la question
        ->join('visitors', 'answers.visitors_id', '=', 'visitors.id') // Jointure sur l'id du visiteur
        ->select('answers.*', 'questions.id as question_id', 'questions.question', 'visitors.name as visitor') // Sélectionner tous les champs de answers, l'id de la question, le texte de la question et le visiteur
        ->orderBy('question_id')
        ->get();
    
        // Créer un tableau pour stocker les réponses
        $response = [];
        foreach ($answers as $answer) {
            $response[] = [
                'question_id' => $answer->question_id, // ID de la question
                'question' => $answer->question,       // Texte de la question
                'answer' => $answer->answer,             // Réponse
                'date' => $answer->created_at->format('d-m-Y H:i:s'),// Date de création
                'visitor' => $answer->visitor
            ];
        }
        // Vérifier si des réponses ont été trouvées
        if ($answers->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aucune réponse trouvée pour ce visiteur.'
            ], 404);
        }
        // Retourner les réponses dans la réponse JSON
        return response()->json([
            'status' => 'success',
            'message' => $response
        ]);
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
