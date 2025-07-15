<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'formation_id'];

   
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }


    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }
}
