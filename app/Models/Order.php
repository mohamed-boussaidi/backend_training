<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'status',
        'collaborateur_id',

    ];
    public function collaborateur(): BelongsTo
    {
        return $this->belongsTo(Collaborateur::class);
    }


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }


}
