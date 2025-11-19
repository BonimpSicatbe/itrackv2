<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityMunicipality extends Model
{
    protected $fillable = ['name'];

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function beneficiaries() {
        return $this->hasMany(Beneficiary::class);
    }
}
