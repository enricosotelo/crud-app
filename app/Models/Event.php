<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'type',
        'name',
        'start_at',
        'description',
        'address',
        'link_address',
        'price'
    ];
}
