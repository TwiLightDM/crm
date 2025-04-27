<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['lead_id', 'name','date', 'status'];

    public function lead(){
        return $this->belongsTo(Lead::class, "lead_id");
    }
}
