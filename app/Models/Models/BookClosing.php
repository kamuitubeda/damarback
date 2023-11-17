<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookClosing extends Model
{
    use HasFactory;

    protected $table = 'book_closing';
    protected $primaryKey = 'id';

    public function schoolYear() {
        return $this->belongsTo(SchoolYear::class);
    }
}
