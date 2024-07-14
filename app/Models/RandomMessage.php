<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomMessage extends Model
{
    use HasFactory;
    protected $table = 'random_messages';
    protected $fillable = [
        'matched_ids',
        'from_id',
        'to_id',
        'message'
    ];
}
