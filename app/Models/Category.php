<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function prestataires()
    {
        return $this->hasMany(User::class, 'categorie_id')->where('role', 'provider');
    }
}
