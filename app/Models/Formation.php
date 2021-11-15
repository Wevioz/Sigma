<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Formation extends Model
{
    use HasFactory;
    protected $table = "formations";
    protected $fillable = ['ownerId', 'title', 'description', 'thumbnail', 'price', 'duration'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'ownerId', 'id');
    }

    public function chapters() {
        return $this->belongsToMany('App\Models\Chapter', 'chapter_formation', 'formation_id', 'chapter_id');
    }

    public function categories() {
        return $this->belongsToMany('App\Models\Category');
    }
    
}
