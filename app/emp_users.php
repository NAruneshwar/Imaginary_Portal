<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emp_users extends Model
{
    protected $guarded = [];
    
    public function profileImage(){
        return '/storage/' . ($this->image) ? $this->image: 'Images/srVlseUJgMZVGUsiYA6CLHzNK71YWyX7ZzMx8WxJ.png';
    }
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
