<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'table_leads';
    protected $fillable = [
        'lead_name',
        'business_name',
        'email',
        'phone',
        'country',
        'city',
        'status',
        'lead_source',
        'lead_status',
        'memberships',
    ];
}
