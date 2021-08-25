<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GlobalService
{
    /**
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string|null
     */

    public function userStore($request, $type): void
    {
        $user = new User();
        $user->tc = $request->tc;
        $user->name = Str::title($request->name);
        $user->surname = Str::title($request->surname);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $type;
        $user->save();
        self::userInfoStore($request, $user->id);
    }

    /**
     * @param $id
     */
    public function userInfoStore($request, $id): void
    {
        !$request->file('photo') ? $path = null : $path = $request->file('photo')->store('avatar','public');
        UserInfo::create([
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => isset($request->status) == 'on' ? 1 : 0,
            'periodId' => $request->periodId,
            'monthId' => $request->monthId,
            'groupId' => $request->groupId,
            'languageId' => $request->languageId,
            'photo' => $path,
            'companyId' => auth()->user()->type === 1 ? $request->companyId : companyId(),
            'userId' => $id
        ]);
    }

    /**
     * @param $id
     */
    public function userUpdate($request, $id): void
    {
        $user = User::find($id);
        isset($request->tc) ?? $user->tc = $request->tc;
        $user->name = Str::title($request->name);
        $user->surname = Str::title($request->surname);
        $user->email = $request->email;
        isset($request->password) ?? $user->password = Hash::make($request->password);
        $user->save();
        self::userInfoUpdate($request,$id);
    }

    /**
     * @param $id
     */
    public function userInfoUpdate($request, $id): void
    {
        !$request->file('photo') ? $path = null : $path = $request->file('photo')->store('avatar','public');
        $user = UserInfo::where('userId', $id)->first();

        $user->phone = $request->phone;
        $user->address = $request->address;
        if (auth()->user()->type == 1 || auth()->user()->type == 2) {
            $user->status = isset($request->status) == 'on' ? 1 : 0;
            $user->periodId = $request->periodId;
            $user->monthId = $request->monthId;
            $user->groupId = $request->groupId;
            $user->languageId = $request->languageId;
            $user->photo = $path;
            $user->companyId = auth()->user()->type === 1 ? $request->companyId : companyId();
            $user->userId = $id;
        }
        $user->save();
    }

    /**
     * @param $id
     */
    public function userDestroy($id): void
    {
        User::find($id)->delete();
        self::userInfoDestroy($id);
    }

    /**
     * @param $id
     */
    public function userInfoDestroy($id): void
    {
        UserInfo::where('userId', $id)->delete();
    }
}
