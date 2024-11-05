<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'long_url',
        'short_code',
        'visit_count',
    ];

    public function use()
    {
        return $this->belongsTo(User::class);
    }

}