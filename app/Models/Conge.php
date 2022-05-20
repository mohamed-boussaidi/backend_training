<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conge extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'conge';

    public function Collaborateur(): BelongsTo
    {
        return $this->belongsTo(Collaborateur::class);
    }
}
