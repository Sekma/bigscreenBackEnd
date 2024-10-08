<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'reference', 'name', 'email'
     ];

    public function answer(){
        return $this->hasMany(Answer::class);
        }
}
