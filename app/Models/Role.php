<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_namr',
        'description',
        'active'        
    ];

    public function users() {
        return $this->hasMany(User::class, 'assigned_roles','role_id','user_id');
    }
}
