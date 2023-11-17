<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $table = 'school_years';
    protected $primaryKey = 'id';

    public function bookClosing() {
        return $this->hasOne(BookClosing::class);
    }
}
