<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'document_name',
        'project_id',
        'user_id'
    ];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
