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
}
