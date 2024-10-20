<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visitor;
use App\Models\Answer;
use App\Models\Question;
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Créer une instance de Faker

        // On récupère tous les id des visiteurs et des questions
        $visitors = Visitor::all();
        $questions = Question::all();

        // Boucle pour créer des réponses fictives pour chaque question et chaque visiteur
        foreach ($visitors as $visitor) {
            foreach ($questions as $question) {
                Answer::factory()->create([
                    'visitors_id' => $visitor->id,
                    'questions_id' => $question->id,
                    'answer' => $this->generateAnswerByQuestionType($visitor, $question, $faker),
                ]);
            }
        }
    }

    /**
     * Génèrer une réponse en fonction du type de question.
     */
    private function generateAnswerByQuestionType($visitor, $question, $faker)
    {
        if ($question->type === 'a') {
            $choices = json_decode($question->choices, true);
            return $faker->randomElement($choices); // Choix aléatoire parmi les options
        
        } elseif ($question->type === 'b') {
            if($question->question === 'Votre adresse mail'){
                return $visitor->email; // Pour l'email
            }elseif($question->question === 'Votre âge'){
                return $faker->numberBetween(15, 60); // Pour l'age
            }else{
                return $faker->sentence; // Pour les questions ouvertes
            }
            
        } elseif ($question->type === 'c') {
            return $faker->numberBetween(0, 5); // Pour les évaluations
        }
        
    }
}
