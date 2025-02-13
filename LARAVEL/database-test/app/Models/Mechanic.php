<?php
 
namespace App\Models;

 use App\Models\Owner;
 use App\Models\Car;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
 
class Mechanic extends Model
{
protected $table = 'mechanics';
    public function carOwner(): HasOneThrough
    {
        return $this->hasOneThrough(Owner::class, Car::class);
    }
    public function car()
    {
        return $this->hasOne(Car::class);
    }
}