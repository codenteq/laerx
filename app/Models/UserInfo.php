<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class UserInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone',
        'address',
        'status',
        'periodId',
        'monthId',
        'groupId',
        'languageId',
        'photo',
        'companyId',
        'userId'
    ];

    /**
     * @param $value
     * @return mixed
     */
    public function getPhoneAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * @param $value
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = encrypt($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getAddressAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * @param $value
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = encrypt($value);
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','userId')->withDefault();
    }

    /**
     * @return HasOne
     */
    public function language(): HasOne
    {
        return $this->hasOne(Language::class,'id','languageId')->withDefault();
    }

    /**
     * @return HasOne
     */
    public function period(): HasOne
    {
        return $this->hasOne(Period::class,'id','periodId')->withDefault();
    }

    /**
     * @return HasOne
     */
    public function group(): HasOne
    {
        return $this->hasOne(Group::class,'id','groupId')->withDefault();
    }

    /**
     * @return HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id','companyId')->withDefault();
    }

    /**
     * @return HasOne
     */
    public function companyInfo(): HasOne
    {
        return $this->hasOne(CompanyInfo::class, 'companyId','companyId')->withDefault();
    }

    /**
     * @return HasOne
     */
    public function month(): HasOne
    {
        return $this->hasOne(Month::class, 'id','monthId')->withDefault();
    }
}
