<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
        'avatar',
        'formation_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class, 'enseignant_id');
    }

    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class, 'etudiant_id');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'etudiant_id');
    }
}
