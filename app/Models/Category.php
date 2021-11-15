<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['ownerId', 'title', 'description'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'ownerId', 'id');
    }

    public function formations() {
        return $this->belongsToMany('App\Models\Formation');
    }
}
