<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $table = 'student_attendances';
    protected $primaryKey = 'id';

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
