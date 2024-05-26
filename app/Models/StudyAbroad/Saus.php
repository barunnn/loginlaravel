<?php

namespace App\Models\StudyAbroad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saus extends Model
{
    use HasFactory;
    protected $table = 'sauses';
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'nearest_office',
        'preferred_study_destination',
        'preferred_study_year',
        'preferred_study_intake',
        'agree_to_terms',
    ];

    protected $guarded = [];
}
