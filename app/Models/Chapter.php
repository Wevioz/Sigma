<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Chapter extends Model
{
    use HasFactory;
    protected $table = "chapters";
    protected $fillable = ['ownerId', 'title', 'content'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'ownerId', 'id');
    }

    public function formations() {
        return $this->belongsToMany('App\Models\Formation');
    }
}
