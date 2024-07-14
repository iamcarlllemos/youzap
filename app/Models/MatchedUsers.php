<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchedUsers extends Model
{
    use HasFactory;
    protected $table = 'matched_users';
    protected $fillable = [
        'user_id_primary',
        'user_id_secondary'
    ];
}
