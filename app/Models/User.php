<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active'        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class,'assigned_roles','user_id','role_id');
    }

    public function mensajes() {
        return $this->hasMany(Message::class);
    }

    public function hasRoles(array $roles) {

        return (bool) $this->roles->pluck('name')->intersect($roles)->count();

    }

    public function isAdmin() {     
        
        return $this->hasRoles(['admin']);

    }
    
    public function adminlte_image() {
        //aca deberia recuperar la imagen de la bd cargada para cada usuario
        return 'htpps://picsum.photos/300/300';
    }

    public function adminlte_desc() {
        
        return $this->roles()->pluck('name')->implode(' - ');

    }

    public function adminlte_profile_url() {
        return 'usuarios/'.$this->id.'/edit';
    }  
}
