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
        'name', 'email', 'password','prof'
    ];
    protected $appends = ['isProf'];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'avatar_path'
    ];
    protected $casts = [
        'confirmed' => 'boolean'
    ];
    public function confirm() {
        $this->confirmed = true;
        $this->save();
    }
    public function avatar() {
        return asset($this->avatar_path ?: 'images/avatars/default.jpg');
    }
    public function getRouteKeyName() {
        return 'name';
    }
    public function threads() {
        return $this->hasMany(Thread::class)->latest();
    }
    public function prof() {
        return $this->hasMany(Classroom::class)->latest();
    }
    public function classes() {
        return $this->hasMany(Classroom::class)->latest();
    }
    public function project() {
        return $this->hasMany(Code::class)->latest();
    }
    public function getIsProfAttribute() {
        return $this->prof()
            ->where('user_id', auth()->id())
            ->exists();
    }
    
}
