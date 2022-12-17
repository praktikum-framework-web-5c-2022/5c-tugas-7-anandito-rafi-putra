<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function eskuls(){
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id'
        ,'extracurricular_id')->withTimestamps();
    }
}
