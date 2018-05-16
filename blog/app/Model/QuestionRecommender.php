<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionRecommender extends Model
{
    protected $fillable = [
        'name', 'content', 'answer_a', 'answer_b'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'answers', 'question_id', 'user_id')->withPivot('answer');
    }
}
