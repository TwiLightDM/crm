<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['project_id', 'name','user_id', 'status'];

    public function project(){
        return $this->belongsTo(Project::class, "project_id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
}
