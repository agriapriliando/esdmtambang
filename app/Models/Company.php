<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_company',
        'name_kontak',
        'kontak',
        'email',
        'catatan',
        'company_code',
        'limit_share',
        'password_active',
        'password',
        'is_active',
    ];

    public function nomorsks()
    {
        return $this->hasMany(Nomorsk::class);
    }
}
