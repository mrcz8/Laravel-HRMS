<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function agents(){
        return $this->hasMany(Agent::class, "id", "agent_id");
    }
    protected $fillable = [
        'account_name',
    ];
}
