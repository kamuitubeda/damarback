<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'student_classes';
    protected $primaryKey = 'id';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function schoolYear() {
        return $this->belongsTo(SchoolYear::class);
    }
}
