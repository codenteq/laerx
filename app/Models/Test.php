<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['title','userId'];
}
