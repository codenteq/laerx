<?php

namespace App\Services;

use App\Models\Company;
use App\Models\CompanyInfo;
use App\Models\Notification;
use App\Models\NotificationDeviceToken;
use App\Models\NotificationUser;
use Kutia\Larafirebase\Facades\Larafirebase;


class FirebaseNotificationService
{
    public function execute($notificationId, $companyId)
    {
        $deviceTokens = self::deviceToken($notificationId);
        $company = self::company($companyId);

        $notification = Notification::find($notificationId);
        $notification->status = 1;
        $notification->save();

        return Larafirebase::withTitle($company['title'])
            ->withBody($notification->message)
            ->withImage($company['logo'])
            ->withPriority('high')
            ->sendNotification($deviceTokens);
    }

    public function setToken($request)
    {
        NotificationDeviceToken::updateOrCreate(
            ['token' => $request->token],
            ['userId' => $request->userId]
        );
    }

    public function deviceToken($notificationId): array
    {
        $notificationUser = NotificationUser::where('notificationId', $notificationId)->pluck('userId');
        $devices = NotificationDeviceToken::select('token')->whereIn('userId', $notificationUser)->get();
        $deviceArr = [];
        foreach ($devices as $device) {
            array_push($deviceArr, $device->token);
        }
        return $deviceArr;
    }

    public function company($companyId): array
    {
        $company = Company::find($companyId);
        $info = CompanyInfo::where('companyId', $companyId)->first();
        return [
            'title' => $company->title,
            'logo' => $info->logo
        ];
    }
}
