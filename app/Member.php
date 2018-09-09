<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Church;

class Member extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['first_name','last_name','city','adress','baptized_water','baptized_spirit','comment','email','phone','image','active','created_at','updated_at','church_id','user_id'];

     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'baptized_water'
    ];
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
    
    public function user()
            {
        return $this->belongsTo(User::class);
            }
}
