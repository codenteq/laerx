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
    private $request;


    public function __construct() {
        $this->request = request();
    }

    public function userStore($type)
    {
        $user = new User();
        $user->tc = $this->request->tc;
        $user->name = Str::title($this->request->name);
        $user->surname = Str::title($this->request->surname);
        $user->email = $this->request->email;
        $user->password = Hash::make($this->request->password);
        $user->type = $type;
        $user->save();
        self::userInfoStore($user->id);
    }

    /**
     * @param $id
     */
    public function userInfoStore($id)
    {
        !$this->request->file('photo') ? $path = null : $path = $this->request->file('photo')->store('public/avatar');
        UserInfo::create([
            'phone' => $this->request->phone,
            'address' => $this->request->address,
            'status' => isset($this->request->status) == 'on' ? 1 : 0,
            'periodId' => $this->request->periodId,
            'monthId' => $this->request->monthId,
            'groupId' => $this->request->groupId,
            'languageId' => $this->request->languageId,
            'photo' => $path,
            'companyId' => auth()->user()->type === 1 ? $this->request->companyId : companyId(),
            'userId' => $id
        ]);
    }

    /**
     * @param $id
     */
    public function userUpdate($id)
    {
        $user = User::find($id);
        isset($this->request->tc) ?? $user->tc = $this->request->tc;
        $user->name = Str::title($this->request->name);
        $user->surname = Str::title($this->request->surname);
        $user->email = $this->request->email;
        isset($this->request->password) ?? $user->password = Hash::make($this->request->password);
        $user->save();
        self::userInfoUpdate($id);
    }

    /**
     * @param $id
     */
    public function userInfoUpdate($id)
    {
        !$this->request->file('photo') ? $path = null : $path = $this->request->file('photo')->store('public/avatar');
        $user = UserInfo::where('userId', $id)->first();

        $user->phone = $this->request->phone;
        $user->address = $this->request->address;
        if (auth()->user()->type == 1 ||  auth()->user()->type == 2) {
            $user->status = isset($this->request->status) == 'on' ? 1 : 0;
            $user->periodId = $this->request->periodId;
            $user->monthId = $this->request->monthId;
            $user->groupId = $this->request->groupId;
            $user->languageId = $this->request->languageId;
            $user->photo = $path;
            $user->companyId = auth()->user()->type === 1 ? $this->request->companyId : companyId();
            $user->userId = $id;
        }
        $user->save();
    }

    public function userDestroy($id)
    {
        User::find($id)->delete();
        self::userInfoDestroy($id);
    }

    public function userInfoDestroy($id)
    {
        UserInfo::where('userId',$id)->delete();
    }
}
