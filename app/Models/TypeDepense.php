<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDepense extends Model
{
    use HasFactory;
    protected $table = 'type_depense';
    protected $fillable = [
       'nom', 
    ];

    public function ExpenseReport(): BelongsToMany
    {
        return $this->belongsToMany(ExpenseReport::class);
    }
}
