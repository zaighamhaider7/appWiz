<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionFeature extends Model
{
    protected $table = 'subscription_feature';
    protected $fillable = [
        'subscription_id', 
        'feature'
    ];

    // public function subscription()
    // {
    //     return $this->belongsTo(Subscription::class);
    // }

}
