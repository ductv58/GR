<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branchs()
    {
        return $this->belongsToMany(Branch::class, 'ratings', 'user_id', 'branch_id')->withPivot('rate');
    }

    public function questionRecommenders()
    {
        return $this->belongsToMany(QuestionRecommender::class, 'answers', 'user_id', 'question_id')->withPivot('answer');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
