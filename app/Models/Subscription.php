<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = [
        'subscription_tag',
        'price',
        'subscription_name',
        'tagline',
        'best_for',
        'main_category',
        'sub_category'
    ];

    public function features()
    {
        return $this->hasMany(SubscriptionFeature::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }
}