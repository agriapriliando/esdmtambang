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
        'jumlah_sk',
        'jumlah_file',
    ];

    public function nomorsks()
    {
        return $this->hasMany(Nomorsk::class);
    }

    public function docs()
    {
        return $this->hasMany(Doc::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name_company', 'like', $term)
                ->orWhere('email', 'like', $term);
        })->orWhereHas('nomorsks', function ($query) use ($term) {
            $query->where('nomor', 'like', $term);
        });
    }
}
