<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'npm';
    protected $keyType = 'int';
    public $incrementing = true; 

    protected $fillable = [
        'npm',
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship
    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_npm', 'npm');
    }
}