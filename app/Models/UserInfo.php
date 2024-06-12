<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Model
{
    use Filterable, HasFactory, SoftDeletes;

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
        'userId',
    ];

    /**
     * @return mixed
     */
    public function getPhoneAttribute($value)
    {
        try {
            return decrypt($value);
        } catch (\Exception $ex) {
            return $value;
        }
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = encrypt($value);
    }

    /**
     * @return mixed
     */
    public function getAddressAttribute($value)
    {
        try {
            return decrypt($value);
        } catch (\Exception $ex) {
            return $value;
        }
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = encrypt($value);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'userId')->withDefault();
    }

    public function language(): HasOne
    {
        return $this->hasOne(Language::class, 'id', 'languageId')->withDefault();
    }

    public function period(): HasOne
    {
        return $this->hasOne(Period::class, 'id', 'periodId')->withDefault();
    }

    public function group(): HasOne
    {
        return $this->hasOne(Group::class, 'id', 'groupId')->withDefault();
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'companyId')->withDefault();
    }

    public function companyInfo(): HasOne
    {
        return $this->hasOne(CompanyInfo::class, 'companyId', 'companyId')->withDefault();
    }

    public function month(): HasOne
    {
        return $this->hasOne(Month::class, 'id', 'monthId')->withDefault();
    }
}
