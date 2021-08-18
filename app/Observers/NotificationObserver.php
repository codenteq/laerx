<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Log;

class NotificationObserver
{

    private $request;

    public function __construct()
    {
        $this->request = request();
    }

    /**
     * Handle the Notification "creating" event.
     *
     * @param  \App\Models\Notification  $notification
     * @return void
     */
    public function creating(Notification $notification)
    {
        $notification->message = $this->request->message;
    }

    /**
     * Handle the Notification "created" event.
     *
     * @param  \App\Models\Notification  $notification
     * @return void
     */
    public function created(Notification $notification)
    {
        foreach ($this->request->except('message') as $key => $val) {
            NotificationUser::create([
                'userId' => $key,
                'notificationId' => $notification->id
            ]);
        }
    }

    /**
     * Handle the Notification "updated" event.
     *
     * @param  \App\Models\Notification  $notification
     * @return void
     */
    public function updated(Notification $notification)
    {
        //
    }

    /**
     * Handle the Notification "deleted" event.
     *
     * @param  \App\Models\Notification  $notification
     * @return void
     */
    public function deleted(Notification $notification)
    {
        //
    }

    /**
     * Handle the Notification "restored" event.
     *
     * @param  \App\Models\Notification  $notification
     * @return void
     */
    public function restored(Notification $notification)
    {
        //
    }

    /**
     * Handle the Notification "force deleted" event.
     *
     * @param  \App\Models\Notification  $notification
     * @return void
     */
    public function forceDeleted(Notification $notification)
    {
        //
    }
}
