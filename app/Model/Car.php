<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'age','free','condition','start_route_at','finish_route_at','start_repairs_at','finish_repairs_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
