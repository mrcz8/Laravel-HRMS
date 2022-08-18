<?php

namespace App\Models;

use \App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_person extends Model
{
    public $table = "contact_persons";

    public function agents(){
        return $this->belongsTo(Agent::class, "id", "agent_id");
    }
    protected $fillable = [
        'agent_id',
        'c_person',
        'relationship',
        'e_address',
        'e_contact',
    ];
} 