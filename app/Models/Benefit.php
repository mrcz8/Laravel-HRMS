<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{

    public function agents(){
        return $this->hasOne(Agent::class, "id", "agent_id");
    }

    protected $fillable = [
        'agent_id',
        'tin',
        'sss',
        'philhealth',
        'pag_ibig',
    ];
}
