<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Support extends Model
{
    use HasFactory;

protected $fillable = [
    'titre','type','fichier',
    'module_id','enseignant_id',
    'views','downloads',
];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'enseignant_id');
    }

    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
    public function fans()
{
    return $this->belongsToMany(
        \App\Models\User::class,
        'favoris',
        'support_id',
        'etudiant_id'
    )->withTimestamps();
}
}
