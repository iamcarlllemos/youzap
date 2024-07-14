<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomQueue extends Model
{
    use HasFactory;

    protected $table = 'random_queue';
    protected $fillable = [
        'user_id_primary',
        'user_id_secondary'
    ];

}
