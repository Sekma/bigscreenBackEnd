<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'visitors_id', 'questions_id', 'answer'
     ];

        public function visitor(){
            return $this->belongsTo(Visitor::class);
        }

        public function question(){
            return $this->belongsTo(Question::class);
        }
}
