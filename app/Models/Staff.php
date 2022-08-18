<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $table = "staffs";

    public function users(){
        return $this->hasOne(User::class,"id", "user_id");
    }

}
