<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class AnimalCategory extends Model
{
    use HasUuids;
    protected $primaryKey = "id"; // nom de la clé primaire
    public $incrementing = false; // pour desactiver l'auto-increment qui pourrait rentrer en concurrence avec uuid
    protected $keyType = "string"; //Type String

    protected $fillable = ['name'];

    public function professionals()
    {
        return $this->belongsToMany(Professional::class);

    }



}
