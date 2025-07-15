<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
     use HasFactory;

    protected $fillable = ['contenu', 'date', 'etudiant_id', 'support_id'];

    /**
     * Commentaire fait par un étudiant
     */
    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    /**
     * Support concerné par le commentaire
     */
    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }
}
