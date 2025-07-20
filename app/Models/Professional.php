<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Professional extends Model
{
    use HasUuids;
    protected $primaryKey = "id"; // nom de la clé primaire
    public $incrementing = false; // pour desactiver l'auto-increment qui pourrait rentrer en concurrence avec uuid
    protected $keyType = "string"; //Type String
    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'company_name',
        'phone',
        'address',
        'city',
        'postal_code',
        'region',
        'is_mobile',
        'profile_picture',
        'website',
        'instagram',
        'facebook',
        'siret',
        'description',
        'price',
        'education_background',
        'experience_background',
        'is_validated',
        'user_id',
    ];
    // protected $hidden = ['password']; // jamais inclure ce champ dans les réponses JSON

    protected $casts = [
        'is_mobile' => 'boolean',
        'is_validated' => 'boolean',
    ]; // converti en true ou false au lieu de O et 1


    // Déclaration des relations Eloquent
    public function animalCategories()
    {

        return $this->belongsToMany(AnimalCategory::class);
    }

    public function jobCategories()
    {

        return $this->belongsToMany(JobCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departments()
    {

        return $this->belongsToMany(Department::class);
    }


}
