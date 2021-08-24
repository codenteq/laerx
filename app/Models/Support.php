<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'subject',
        'message',
        'userId',
        'status'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id','userId');
    }

    public function info()
    {
        return $this->hasOne(UserInfo::class, 'userId','userId');
    }
}
