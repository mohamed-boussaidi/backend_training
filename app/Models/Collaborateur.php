<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Collaborateur extends Authenticatable implements JWTSubject
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
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
