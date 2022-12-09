<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function team() {
        return $this->belongsTo(Team::class);
    }
    public function yellow() {
        return $this->hasMany(Yellow::class);
    }
    public function red() {
        return $this->hasMany(Red::class);
    }
    public function goal() {
        return $this->hasMany(Goal::class);
    }
}
