<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['contenu', 'etudiant_id', 'support_id'];
public function etudiant()
{
    return $this->belongsTo(User::class, 'etudiant_id');
}

    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }
}
