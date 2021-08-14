<?php

namespace App\Observers;

use App\Helpers\Helper;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserObserver
{
    private $request;

    /**
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->request = request();
    }

    /**
     * Handle the User "creating" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->tc = $this->request->tc;
        $user->name = Str::title($this->request->name);
        $user->surname = Str::title($this->request->surname);
        $user->email = $this->request->email;
        $user->password = Hash::make($this->request->password);
    }

    /**
     * Handle the User "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
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
            'companyId' => auth()->user()->type === 1 ? $this->request->companyId : Helper::companyId(),
            'userId' => $user->id
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function updating(User $user)
    {
        $user->tc = $this->request->tc;
        $user->name = Str::title($this->request->name);
        $user->surname = Str::title($this->request->surname);
        $user->email = $this->request->email;
        $user->password = Hash::make($this->request->password);

        !$this->request->file('avatar') ? $path = null : $path = $this->request->file('photo')->store('public/avatar');
        UserInfo::where('userId', $user->id)->update([
            'phone' => $this->request->phone,
            'address' => $this->request->address,
            'status' => isset($this->request->status) == 'on' ? 1 : 0,
            'periodId' => $this->request->periodId,
            'monthId' => $this->request->monthId,
            'groupId' => $this->request->groupId,
            'languageId' => $this->request->languageId,
            'photo' => $path,
            'companyId' => auth()->user()->type === 1 ? $this->request->companyId : Helper::companyId(),
            'userId' => $user->id
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
