<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'npwp','password','name', 'address', 'status'
    ];

    public function document(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
