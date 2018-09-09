<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
Use App\Church;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password'
    ];
    
    public function churches()
            {
    return $this->hasMany(Church::class);
            }
            
    public function members1()
            {
    return $this->hasMany(Member::class);
            }
       /*     
    public function members1()
            {
    return $this->hasMany(Member::class);
            }
*/
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
}