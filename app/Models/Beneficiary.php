<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    public function cityMunicipality() {
        return $this->belongsTo(CityMunicipality::class);
    }
}
