<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClockIn extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'clock_in_time', 'clock_out_time', 'hours_worked'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
