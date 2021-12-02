<?php

namespace App\Services;

use App\Jobs\ImageConvertJob;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GlobalService
{

    protected $convertService;

    public function __construct(ImageConvertService $convertService)
    {
        $this->convertService = $convertService;
    }

    /**
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string|null
     */
    public function userStore($request, $type): void
    {
        DB::transaction(function () use ($request, $type) {
            $user = new User();
            $user->tc = $request->tc;
            $user->name = Str::title($request->name);
            $user->surname = Str::title($request->surname);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = $type;
            $user->save();
            self::userInfoStore($request, $user->id);
        });
    }

    /**
     * @param $id
     */
    public function userInfoStore($request, $id): void
    {
        !$request->file('photo') ? $path = null : $path = $request->file('photo')->store('avatar', 'public');
        UserInfo::create([
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'periodId' => $request->periodId,
            'monthId' => $request->monthId,
            'groupId' => $request->groupId,
            'languageId' => $request->languageId,
            'photo' => $path ?? '/images/avatar.png',
            'companyId' => auth()->user()->type == User::Admin ? $request->companyId : companyId(),
            'userId' => $id
        ]);
        if ($path != null) {
            //ImageConvertJob::dispatch($id, 'user', $path)->onQueue('image');
            $this->convertService->execute($id, 'user', $path);
        }
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
        if ($user->type != User::Admin) {
            self::userInfoUpdate($request, $id);
        }
    }

    /**
     * @param $id
     */
    public function userInfoUpdate($request, $id): void
    {
        !$request->file('photo') ? $path = null : $path = $request->file('photo')->store('avatar', 'public');
        $user = UserInfo::where('userId', $id, 'user')->first();
        if ($path != null) {
            //ImageConvertJob::dispatch($id, 'user', $path)->onQueue('image');
            //$user->photo = $path;
            $this->convertService->execute($id, 'user', $path);
        }

        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->languageId = $request->languageId;
        if (auth()->user()->type == User::Admin || auth()->user()->type == User::Manager) {
            $user->status = $request->status ?? 0;
            $user->periodId = $request->periodId;
            $user->monthId = $request->monthId;
            $user->groupId = $request->groupId;
            $user->companyId = auth()->user()->type == User::Admin ? $request->companyId : companyId();
            $user->userId = $id;
        }
        Artisan::call('cache:clear');
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
     * @param $ids
     */
    public function userMultipleDestroy($ids): void
    {
        info($ids);
        User::whereIn('id', $ids)->delete();
        self::userInfoMultipleDestroy($ids);
    }

    /**
     * @param $id
     */
    public function userInfoDestroy($id): void
    {
        UserInfo::where('userId', $id)->delete();
    }

    /**
     * @param $ids
     */
    public function userInfoMultipleDestroy($ids): void
    {
        UserInfo::whereIn('userId', $ids)->delete();
    }
}
