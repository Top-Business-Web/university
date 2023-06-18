<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(mixed $id)
 * @method static get()
 */
class Selection extends Model
{
    protected $fillable = [
        'name',
        'details',
    ];
    protected $casts = [
        'details' => 'json',
    ];
}
