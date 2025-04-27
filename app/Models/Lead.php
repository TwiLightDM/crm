<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'patronymic', 'phone', 'status'];

    public function fio(){
        $res = $this->surname . ' ' . mb_substr($this->name, 0, 1) . '.';
        if ($this->patronymic != '' && $this->patronymic != null) $res = $res . ' ' . mb_substr($this->patronymic, 0, 1) . '.';
        return $res;    
    }

    public function fullName(){
        $res = $this->surname . ' ' . $this->name;
        if ($this->patronymic != '' && $this->patronymic != null) $res = $res . ' ' . $this->patronymic;
        return $res;    
    }
}
