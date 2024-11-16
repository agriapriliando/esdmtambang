<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'company_id',
        'title',
        'type',
        'size',
        'file_link',
        'upload_by',
        'visibilitas',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                ->orWhere('upload_by', 'like', $term);
        })->orWhereHas('company', function ($query) use ($term) {
            $query->where('name_company', 'like', $term);
        });
    }
}
