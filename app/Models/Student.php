<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table="students";

    public function concept() {
        return $this->hasOne(ConceptPaper::class);
    }

    public function proposal() {
        return $this->hasOne(Proposal::class);
    }

    public function analysis() {
        return $this->hasOne(Analysis::class);
    }

    public function design() {
        return $this->hasOne(Design::class);
    }

    public function implementation() {
        return $this->hasOne(Implementation::class);
    }
}
