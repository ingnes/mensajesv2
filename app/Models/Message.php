<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $fillable = ['nombre','email','mensaje'];
   
    use HasFactory;

    // me da los mensajes enviados por el usurio
    // se lee un mensaje pertenece a un usuario que lo envia
    public function enviado_por() {
        return $this->belongsTo(User::class, 'user_id');
    }

    //me da los mensajes recibidos x el usuario
    // se lee un mensaje pertenece a un usuario que lo recibe
    public function recibido_por() {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function tags() 
    {        
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function notes() 
    {
        return $this->morphMany(Note::class,'notable')->orderBy('id');
    }
}
