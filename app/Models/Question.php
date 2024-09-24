<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'type', 'question', 'choices'
     ];
     protected $casts = [
        'choices' => 'array', // Indique à Eloquent de traiter cette colonne comme un tableau
    ];

    public function answer(){
        return $this->hasMany(Answer::class);
        }
}
