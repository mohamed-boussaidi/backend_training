<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    use HasFactory;
    protected $table = 'collaborateurs';
    protected $guarded = ['id'];
    protected $hidden = [
     'employee_password', 'remember_token',
    ];

    protected $fillable = [
        'matricule',
        'civilite',
        'nom',
        'prenom',
        'telephone',
        'e-mail',
        'carte_identite',
        'date_naissance',
        'adresse',
        'code_postale',
        'type_contrat',
        'fonction',
        'date_entree',
        'date_sortie',
        'pole',
        'immeuble',
        'adresse_imme',
        'code_postal_imme',
        'ville',
        'departement',
        'parrain',
        'manager',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function SalleReservation()
    {
        return $this->hasMany(SalleReservation::class);
    }
    public function ExpenseReport()
    {
        return $this->hasMany(ExpenseReport::class);
    }
    public function Conge()
    {
        return $this->hasMany(Conge::class);
    }
    public function getAuthPassword()
    {
     return $this->employee_password;
    }
}
