<?php

namespace App\Services\Manager;

use App\Jobs\NotificationJob;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationService
{
    protected $notificationService;

    public function __construct(FirebaseNotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $notification = Notification::create([
                'message' => ucfirst($request->message),
                'companyId' => companyId()
            ]);
            self::storeUser($request, $notification->id);
            //NotificationJob::dispatch($notification->id,companyId())->onQueue('notification');
            $this->notificationService->execute($notification->id, companyId());
        });
    }

    public function storeUser(Request $request, $id)
    {
        foreach ($request->except(['message', '_token']) as $key => $val) {
            NotificationUser::create([
                'userId' => $key,
                'notificationId' => $id
            ]);
        }
    }
}
