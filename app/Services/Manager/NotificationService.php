<?php

namespace App\Services\Manager;

use App\Models\Notification;
use App\Models\NotificationUser;
use Illuminate\Http\Request;

class NotificationService
{
    public function store(Request $request)
    {
        $notification = Notification::create([
            'message' => ucfirst($request->message)
        ]);
        self::storeUser($request, $notification->id);
    }

    public function storeUser(Request $request, $id)
    {
        foreach ($request->except('message') as $key => $val) {
            NotificationUser::create([
                'userId' => $key,
                'notificationId' => $id
            ]);
        }
    }
}
