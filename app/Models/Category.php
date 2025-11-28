<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'subscription_categories';
    protected $fillable = [
        'category_name',
        'category_icon',
        'is_sub',
        'parent_id'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'main_category');
    }

}
