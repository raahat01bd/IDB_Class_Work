<?php

namespace App\Models;
use App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function university ()
    {
        return $this->hasOne(University::class);
    }
}
