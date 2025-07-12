<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


    protected $fillable = ['code', 'name'];

    public function professionals()
    {
        return $this->belongsToMany(Professional::class);

    }

}
