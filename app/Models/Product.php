<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'product';
    protected $fillable = [
        'matricule',
        'nom',
        'type',
        'modele',
        'prix',
    ];


    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
