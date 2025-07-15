<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
   use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'role',
        'avatar',
        'formation_id',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    /**
     * Récupère la formation de l'étudiant (s'il en a une)
     */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }

    /**
     * Récupère les supports déposés (si c'est un enseignant)
     */
    public function supports(): HasMany
    {
        return $this->hasMany(Support::class, 'enseignant_id');
    }

    /**
     * Récupère les évaluations faites (si c'est un étudiant)
     */
    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class, 'etudiant_id');
    }

    /**
     * Récupère les commentaires faits (si c'est un étudiant)
     */
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'etudiant_id');
    }

    /**
     * Redéfinir le mot de passe si le champ s'appelle "mot_de_passe"
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
