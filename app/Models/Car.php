<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

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
