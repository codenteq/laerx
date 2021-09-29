<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','userId'];

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class,'userId','userId');
    }
}
