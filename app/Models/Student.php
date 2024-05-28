<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nisn', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consuling()
    {
        return $this->hasMany(Consuling::class);
    }
}
