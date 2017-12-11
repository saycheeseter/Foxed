<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $appends = ['isProf'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'isProf'
    ];

    public function getRouteKeyName() {
        return 'name';
    }
    public function threads() {
        return $this->hasMany(Thread::class)->latest();
    }
    public function getIsProfAttribute() {
        return $this->prof()
            ->where('user_id', auth()->id())
            ->exists();
    }
    public function prof() {
        return $this->hasMany(Classroom::class)->latest();
    }
    public function classes() {
        return $this->belongsTo(Classroom::class)->latest();
    }
    public function project() {
        return $this->hasMany(Code::class)->latest();
    }
}