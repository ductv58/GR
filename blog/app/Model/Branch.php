<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branchs";
    protected $fillable = [
        'name', 'description', 'link', 'avatar'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'ratings', 'branch_id', 'user_id')->withPivot('rate');
    }
}
