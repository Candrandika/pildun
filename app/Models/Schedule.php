<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function team1() {
        return $this->belongsTo(Team::class, 'team_1', 'id');
    }
    public function team2() {
        return $this->belongsTo(Team::class, 'team_2', 'id');
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
