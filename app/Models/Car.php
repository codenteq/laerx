<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate_code',
        'companyId',
        'typeId',
        'status'
    ];

    public function type()
    {
        return $this->hasOne(CarType::class,'id','typeId');
    }
}
