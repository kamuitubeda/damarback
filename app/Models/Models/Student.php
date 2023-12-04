<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';

    public function permissions() {
        return $this->hasMany(Permission::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function billings() {
        return $this->hasMany(Billing::class);
    }

    public function studentClasses() {
        return $this->hasMany(StudentClass::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'student_classes');
    }

    public function parentUser()
    {
        return $this->belongsTo(ParentUser::class);
    }
}
