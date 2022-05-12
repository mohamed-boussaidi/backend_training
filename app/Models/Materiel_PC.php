<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel_PC extends Model
{
    use HasFactory;
    protected $table = 'materiel';
    protected $fillable = [
       'matricule',
       'n_serie',
       'marque',
       'utilisateur',
       'statut',
       'email',
       'action',
       
    ];


}
