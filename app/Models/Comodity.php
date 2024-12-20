<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comodity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_commodity',
        'group',
        'notes_commodity',
    ];
}
