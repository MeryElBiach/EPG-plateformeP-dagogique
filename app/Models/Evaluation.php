<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
     use HasFactory;

    protected $fillable = ['valeur', 'etudiant_id', 'support_id'];

    /**
     * Évaluation faite par un étudiant
     */
    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    /**
     * Support évalué
     */
    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }
}
