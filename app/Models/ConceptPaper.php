<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptPaper extends Model
{
    use HasFactory;

    protected $table="concept_papers";

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
