<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    const APPROVE = 1;
    const NOT_APPROVE = 0;
    const SELECT_REPORT_STATUS = [
        self::NOT_APPROVE => 'Not Approve',
        'all' => 'All',
        self::APPROVE => 'Approve',
    ];

    protected $fillable = [
        'content',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
