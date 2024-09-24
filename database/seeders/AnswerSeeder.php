<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visitor;
use App\Models\Answer;
use App\Models\Question;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answerRatios = [
            ['visitors_id' => 1, 'questions_id' => 1, 'answer' => 'visitor 1 question 1'],
            ['visitors_id' => 1, 'questions_id' => 2, 'answer' => 'visitor 1 question 2'],
            ['visitors_id' => 2, 'questions_id' => 1, 'answer' => 'visitor 2 question 1'],
            ['visitors_id' => 2, 'questions_id' => 2, 'answer' => 'visitor 2 question 2'],
            ['visitors_id' => 3, 'questions_id' => 1, 'answer' => 'visitor 3 question 1'],
            ['visitors_id' => 3, 'questions_id' => 2, 'answer' => 'visitor 3 question 2'],
           ];

        foreach ($answerRatios as $ratio) {
            Answer::create($ratio);
        }
    }
}
