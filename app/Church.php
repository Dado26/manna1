<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Member;

class Church extends Model
{
    
    protected $fillable = ['name','city','created_at','updated_at'];
    
    public function user()
            {
        return $this->belongsTo(User::class);
            }
            
    public function members()
            {
    return $this->hasMany(Member::class);
            }
}
