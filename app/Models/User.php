<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'department_id',
        'email',
        'password',
        'blocked',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

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

    public function meetings(){
        return $this->hasMany(Meeting::class, "user_id");
    }

    public function tasks(){
        return $this->hasMany(Task::class, "user_id");
    }

    public function department(){
        return $this->belongsTo(Department::class, "department_id");
    }

    public static function admin(){
        return User::select('users.*')
            ->join('model_has_roles','model_has_roles.model_id','=','users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')
            ->where('roles.name','super-admin')
            ->get()
            ->first();
    }
}
