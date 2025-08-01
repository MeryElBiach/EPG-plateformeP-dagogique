<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'formation_id', 'elements','enseignant_id' ];

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }
    public function enseignant(){ return $this->belongsTo(User::class,'enseignant_id'); }
}
