<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'company',
        'website',
        'role_id',
        'business_name',
        'phone',
        'country',
        'city',
        'status',
        'leads',
        'membership',
        'is_suspended',
        'is_deleted'
    ];
      public function roles()
    {
        return $this->belongsTo(roles::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function assignedProjects()
    {
        return $this->belongsToMany(
            project::class,
            'assign_to',      // table name
            'assign_to',      // user id column
            'project_id'      // project id column
        );
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

}
