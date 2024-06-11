<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['userId', 'notificationId'];

    public function notification()
    {
        return $this->hasOne(Notification::class, 'id', 'notificationId')->latest();
    }
}
