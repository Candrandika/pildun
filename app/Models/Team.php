<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function player() {
        return $this->hasMany(Player::class);
    }
    public function coach() {
        return $this->hasMany(Coach::class);
    }
    public function schedule() {
        return $this->hasMany(Schedule::class);
    }
    public function captain() {
        return $this->belongsTo(Player::class);
    }
    public function main_coach() {
        return $this->belongsTo(Coach::class);
    }
    public function goal() {
        return $this->hasMany(Goal::class);
    }
    public function red() {
        return $this->hasMany(Red::class);
    }
    public function yellow() {
        return $this->hasMany(Yellow::class);
    }
}
