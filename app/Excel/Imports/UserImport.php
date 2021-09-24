<?php

namespace App\Excel\Imports;

use App\Models\Group;
use App\Models\Month;
use App\Models\Period;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return self::userStore($row);
    }

    public function userStore($row): void
    {
        $user = new User();
        $user->tc = $row['tc'];
        $user->name = $row['adi'];
        $user->surname = $row['soyadi'];
        $user->email = $row['eposta'];
        $user->password = Hash::make('12345678');
        $user->type = User::Normal;
        $user->save();

        self::userInfoStore($row,$user->id);
    }

    public function userInfoStore($row, $id): void
    {
        $period = Period::where('title',$row['donem'])->first();
        $month = Month::where('title',$row['ay'])->first();
        $group = Group::where('title',$row['sinif'])->first();

        $info = new UserInfo();
        $info->status = true;
        $info->phone = $row['telefon'];
        $info->address = $row['adres'];
        $info->periodId = $period['id'];
        $info->monthId = $month['id'];
        $info->groupId = $group['id'];
        $info->companyId = companyId();
        $info->userId = $id;
        $info->save();
    }
}