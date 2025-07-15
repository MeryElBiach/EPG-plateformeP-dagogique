<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'type',
        'fichier',
        'date_soumission',
        'module_id',
        'enseignant_id'
    ];

    /**
     * Ce support appartient à un module
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Ce support a été déposé par un enseignant
     */
    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'enseignant_id');
    }

    /**
     * Évaluations du support
     */
    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }

    /**
     * Commentaires liés à ce support
     */
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
}
