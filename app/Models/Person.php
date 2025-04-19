<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //use HasFactory;
    protected $table = 'persons';
    protected $guarded = ['id'];

    public function staff() {
        return $this->belongsTo(Staff::class, 'Staff');
    }
}
