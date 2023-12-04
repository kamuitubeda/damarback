<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function studentClasses() {
        return $this->hasMany(StudentClass::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_classes');
    }
}
