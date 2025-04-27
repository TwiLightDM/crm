<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = ['lead_id', 'user_id', 'date', 'place', 'status'];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function lead(){
        return $this->belongsTo(Lead::class, "lead_id");
    }
}
