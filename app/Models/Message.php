<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $fillable = ['nombre','email','mensaje'];
   
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
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
