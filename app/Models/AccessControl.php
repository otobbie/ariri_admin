<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccessControl extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name'];

    //Define relationship with users
    public function users()
    {
        return $this->hasMany(User::class, 'access_control');
    }
}
