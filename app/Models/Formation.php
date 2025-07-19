<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
