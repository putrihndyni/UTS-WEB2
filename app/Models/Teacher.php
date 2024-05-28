<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'email', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consuling()
    {
        return $this->hasMany(Consuling::class);
    }
}
