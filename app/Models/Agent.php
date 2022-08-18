<?php

namespace App\Models;

use \App\Models\Contact_person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    public function benefits(){
        return $this->belongsTo(Benefit::class, "id", "agent_id");
    }
    public function contact_persons(){
        return $this->belongsTo(Contact_person::class, "id", "agent_id");
    }
    public function accounts(){
        return $this->hasOne(Account::class, "id", "account_id");
    }
    public function contracts(){
        return $this->hasOne(Contract::class, "id", "account_id");
    }

    protected $fillable = [
            'bio_no',
            'account_id',
            'emp_no',
            'name',
            'address',
            'contact_no',
            'date_of_birth',
            'date_hired',
            'status',  
    ];
} 
