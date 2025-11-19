<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_number',
        'project_name',
        'city_municipality',
        'partner',
        'number_of_days',
        'starting_date',
        'ending_date',
        'number_of_beneficiaries',
        'daily_wage',
        'total_cost',
    ];

    protected $casts = [
        'project_number' => 'string',
        'starting_date' => 'date',
        'ending_date' => 'date',
        'daily_wage' => 'decimal:2',
        'total_cost' => 'decimal:2',
    ];

    protected function implementationDate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->starting_date->format('F d, Y') . ' to ' . $this->ending_date->format('F d, Y')
        );
    }

    public function cityMunicipality()
    {
        return $this->belongsTo(CityMunicipality::class, 'city_municipality', 'id');
    }
}
