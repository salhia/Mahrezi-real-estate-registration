<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OpportunityImage;
class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'opportunity_number',
        'researcher_name',
        'region',
        'phone_number',
        'building_details',
        'contact_details',
        'location',
        'building_image', // Include other fields that should be mass assignable
        'latitude',  // New field
        'longitude', // New field
        'user_id', // Add user_id to fillable
    ];


}
